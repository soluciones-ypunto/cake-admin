<?php
namespace Ypunto\Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Etiquetas Model
 *
 * @property \Ypunto\Admin\Model\Table\EntidadesTable|\Cake\ORM\Association\BelongsToMany $Entidades
 *
 * @method \Ypunto\Admin\Model\Entity\Etiqueta get($primaryKey, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta newEntity($data = null, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta[] newEntities(array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta[] patchEntities($entities, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Etiqueta findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EtiquetasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('etiquetas');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Entidades', [
            'foreignKey' => 'etiqueta_id',
            'targetForeignKey' => 'entidad_id',
            'joinTable' => 'etiquetas_entidades',
            'className' => 'Ypunto/Admin.Entidades'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 60)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'test';
    }
}
