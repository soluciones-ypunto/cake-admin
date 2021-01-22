<?php
/**
 * Created by javier
 * Date: 13/3/20
 * Time: 12:58
 */
/** @var \App\View\AppView $this */

use Cake\Utility\Inflector;

$_action = $this->getRequest()->getParam('action');
$isEdit = $_action === 'edit';
$isAdd = $_action === 'add';

/**
 * sino se proveyó entity, intentamos determinarla desde el nombre del controlador, de esta manera aseguramos
 * el correcto funcionamiento.
 */
if ($isEdit && empty($entity)) {
    $_entityName = Inflector::variable(Inflector::singularize($this->request->getParam('controller')));
    $entity = !empty(${$_entityName}) ? ${$_entityName} : new \Cake\ORM\Entity();
}
?>

<div class="card-body d-flex justify-content-betwee flex-row-reverse">
    <?= $this->Form->button(
        __('{icon} Guardar', ['icon' => '<i class="fas fa-fw fa-save"></i>']),
        ['escapeTitle' => false, 'class' => 'ml-auto']
    ) ?>

    <?php if ($isAdd): ?>
        <?= $this->Form->button(
            '<i class="fas fa-save"></i><i class="fas fa-plus-square fa-fw"></i>',
            [
                'escapeTitle' => false,
                'class'  => 'btn-light-alt',
                'title'  => __('Guarda el registro y pasa a crear uno nuevo'),
                'name'   => '_nextAction',
                'value'  => 'add',
            ]
        ) ?>
    <?php endif; ?>
</div>

<?php if ($isAdd): ?>
    <div class="card-body bg-light">
        <p class="mb-0 small">
            <?= __('Puede pulsar en {icon} para guardar y continuar con la carga de otro registro.', [
                'icon' => '<span class="border border-default d-inline-block px-1 mx-1"><i class="fas fa-save fa-fw"></i><i class="fas fa-plus-square fa-fw"></i></span>'
            ]) ?>
        </p>
    </div>
<?php endif; ?>

<?php if ($isEdit): ?>
    <?= $this->element('Entity/info', compact('entity')) ?>

<?php endif; ?>