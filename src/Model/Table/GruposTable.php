<?php
namespace Ypunto\Admin\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grupos Model
 *
 * @property \Ypunto\Admin\Model\Table\EntidadesTable|\Cake\ORM\Association\HasMany $Entidades
 *
 * @method \Ypunto\Admin\Model\Entity\Grupo get($primaryKey, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo newEntity($data = null, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo[] newEntities(array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo[] patchEntities($entities, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Grupo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GruposTable extends Table
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

        $this->setTable('grupos');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Entidades', [
            'foreignKey' => 'grupo_id',
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
            ->maxLength('nombre', 80)
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
