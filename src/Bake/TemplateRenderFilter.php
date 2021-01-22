<?php
/**
 * Created by javier
 * Date: 11/12/18
 * Time: 20:21
 */

namespace Ypunto\Admin\Bake;

use Bake\View\BakeView;
use Bake\View\Helper\BakeHelper;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\ORM\Association;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\BelongsToMany;
use Cake\Utility\Hash;

/**
 * Class TemplateRenderFilter
 * @package Ypunto\Admin\Bake
 */
class TemplateRenderFilter implements EventListenerInterface
{
    /**
     * @var array
     */
    protected $_timestampFields = ['created', 'modified', 'updated', 'deleted'];

    /**
     * Returns a list of events this object is implementing. When the class is registered
     * in an event manager, each individual method will be associated with the respective event.
     *
     * ### Example:
     *
     * ```
     *  public function implementedEvents()
     *  {
     *      return [
     *          'Order.complete' => 'sendEmail',
     *          'Article.afterBuy' => 'decrementInventory',
     *          'User.onRegister' => ['callable' => 'logRegistration', 'priority' => 20, 'passParams' => true]
     *      ];
     *  }
     * ```
     *
     * @return array associative array or event key names pointing to the function
     * that should be called in the object when the respective event is fired
     */
    public function implementedEvents(): array
    {
        return [
            'Bake.beforeRender' => 'beforeRender',
            'Bake.beforeRender.Model.table' => 'beforeRenderTable',
            'Bake.beforeRender.Controller.controller' => 'beforeRenderController',
        ];
    }

    /**
     * @param Event $event
     */
    public function beforeRenderController(Event $event)
    {
        /**
         * @var BakeView $view
         * @var \Cake\ORM\Table $model
         */
        $view = $event->getSubject();
        $model = $view->get('modelObj');
        $primaryKey = $model->getPrimaryKey();
        $assocs = array_merge(
            $model->associations()->getByType('belongsTo'),
            $model->associations()->getByType('belongsToMany')
        );

        $view->set(compact('primaryKey', 'assocs'));
    }

    /**
     * @param Event $event
     */
    public function beforeRender(Event $event)
    {
        /** @var BakeView $view */
        $view = $event->getSubject();
        $action = $view->get('action');

        switch ($action) {
            case 'index':
                $this->_prepareIndexAction($view);
                break;
            case 'add':
            case 'edit':
            case '_form':
                $this->_prepareFormAction($view);
                break;
            case 'view':
                $this->_prepareViewAction($view);
                break;
        }
    }

    /**
     * @param Event $event
     */
    public function beforeRenderTable(Event $event)
    {
        /** @var BakeView $view */
        $view = $event->getSubject();

        $displayField = $view->get('displayField');
        $primaryKey = $view->get('primaryKey');
        $fields = $view->get('fields');

        /** @todo Make this configurable */
        $possibleDisplayFields = ['nombre', 'titulo', 'denominacion'];
        $displayFieldCandidates = array_intersect($possibleDisplayFields, $fields);

        /** Establecemos un displayField más apropiado si es posible */
        if (
            in_array($displayField, $primaryKey) && // si tiene como displayField una primaryKey (default)
            !empty($displayFieldCandidates) // y existe algún campo candidato a displayField
        ) {
            // entonces establecemos nombre como displayField
            $view->set('displayField', $displayFieldCandidates[0]);
        }
    }

    /**
     * @param BakeView $view
     */
    protected function _prepareIndexAction(BakeView $view)
    {
        $associations = $view->get('associations');
        $foreignKeys = Hash::extract($associations, "{*}.{*}.foreignKey");

        // tenemos que seleccionar un campo de alguna relación belongsTo (y hasOne?), el primero que haya
        $associationField = null;
        if (!empty($associations['BelongsTo'])) {
            $associationField = reset($associations['BelongsTo']);
        }

        $specialFields = array_unique(array_merge(
            [$view->get('displayField')],
            $foreignKeys,
            $view->get('primaryKey')
        ));

        // seleccionamos el primer campo que venga que no sea una relación, PK ni displayField
        $dropField = null;
        foreach ($view->get('fields') as $field) {
            if (!in_array($field, $specialFields)) {
                $dropField = $field;
                $specialFields[] = $field;
                break;
            }
        }

        /** @var BakeHelper $bakeHelper */
        $bakeHelper = $view->helpers()->get('Bake');
        // esto se hacía en la vista en los templates de bake, lo paso acá para filtrar antes de tomar 2 campos
        $fields = $bakeHelper->filterFields(
            $view->get('fields'),
            $view->get('schema'),
            $view->get('modelObject'),
            $view->get('indexColumns'),
            ['binary', 'text']
        );

        // ahora nos queda seleccionar dos campos más, los dos primeros que aparezcan que no sean
        $otherListedFields = array_slice(array_diff($fields, $specialFields), 0, 2);
        /** @todo parametrizar la cantidad de "otros" campos */

        $view->set(compact('associationField', 'dropField', 'otherListedFields'));
    }

    /**
     * @param BakeView $view
     */
    protected function _prepareFormAction(BakeView $view)
    {
        // esto se hacía en la vista en los templates de bake, lo paso acá para filtrar antes de tomar 2 campos
        $fields = $view->helpers()->get('Bake')->filterFields(
            $view->get('fields'),
            $view->get('schema'),
            $view->get('modelObject')
        );

        $fields = array_diff($fields, array_merge($this->_timestampFields, $view->get('primaryKey')));
        $typeMap = $view->get('schema')->typeMap();
        $keyFields = $view->get('keyFields');

        $mainSectionFields = array_filter($fields, function ($field) use ($typeMap, $keyFields) {
            return !in_array($typeMap[$field], ['integer', 'decimal', 'float', 'boolean']) || in_array($field, array_keys($keyFields));
        });

        $sideSectionFields = array_diff($fields, $mainSectionFields);
        $associations = $view->get('associations');
        $associationVarOptions = [];

        foreach ($view->get('modelObject')->associations() as $assoc) {
            /** @var Association $assoc */
            switch (get_class($assoc)) {
                case BelongsTo::class:
                    $assocData = $associations['BelongsTo'][$assoc->getAlias()];
                    break;
                case BelongsToMany::class:
                    $assocData = $associations['BelongsToMany'][$assoc->getAlias()];
                    break;
                default:
                    continue 2;
            }

            $associationVarOptions[$assocData['variable']] = $assoc->getTarget()->getEntityClass();
        }

        $view->set(compact('mainSectionFields', 'sideSectionFields', 'associationVarOptions'));
    }

    /**
     * @param BakeView $view
     */
    protected function _prepareViewAction(BakeView $view)
    {
        $associations = $view->get('associations') + [
                'BelongsTo' => [],
                'HasOne' => [],
                'HasMany' => [],
                'BelongsToMany' => [],
            ];
        $fields = $view->get('fields');
        $_pk = $view->get('primaryKey')[0];

        if (in_array($_pk, $fields)) {
            unset($fields[array_search($_pk, $fields)]);
        }

        /** @var BakeHelper $bakeHelper */
        $bakeHelper = $view->helpers()->get('Bake');
        $fieldsData = $bakeHelper->getViewFieldsData($fields, $view->get('schema'), $associations);

        if (!empty($fieldsData['groupedFields']['date'])) {
            foreach ($fieldsData['groupedFields']['date'] as $_key => $field) {
                if (in_array($field, $this->_timestampFields)) {
                    unset($fieldsData['groupedFields']['date'][$_key]);
                    $view->set($field, true);
                }
            }
        }

        $view->set(compact('associations', 'fieldsData'));
    }
}