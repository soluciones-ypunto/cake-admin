<?php
namespace Ypunto\Admin\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cosas Model
 *
 * @property \Ypunto\Admin\Model\Table\EntidadesTable|\Cake\ORM\Association\BelongsTo $Entidades
 *
 * @method \Ypunto\Admin\Model\Entity\Cosa get($primaryKey, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa newEntity($data = null, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa[] newEntities(array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa[] patchEntities($entities, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Cosa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CosasTable extends Table
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

        $this->setTable('cosas');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Entidades', [
            'foreignKey' => 'entidad_id',
            'joinType' => 'INNER',
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
            ->maxLength('nombre', 255)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('descripcion')
            ->allowEmpty('descripcion');

        $validator
            ->decimal('precio')
            ->allowEmpty('precio');

        $validator
            ->integer('cantidad')
            ->allowEmpty('cantidad');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['entidad_id'], 'Entidades'));

        return $rules;
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
