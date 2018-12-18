<?php
namespace Ypunto\Admin\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * Entidades Model
 *
 * @property \Ypunto\Admin\Model\Table\GruposTable|\Cake\ORM\Association\BelongsTo $Grupos
 * @property \Ypunto\Admin\Model\Table\CosasTable|\Cake\ORM\Association\HasMany $Cosas
 * @property \Ypunto\Admin\Model\Table\EtiquetasTable|\Cake\ORM\Association\BelongsToMany $Etiquetas
 *
 * @method \Ypunto\Admin\Model\Entity\Entidad get($primaryKey, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad newEntity($data = null, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad[] newEntities(array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad[] patchEntities($entities, array $data, array $options = [])
 * @method \Ypunto\Admin\Model\Entity\Entidad findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EntidadesTable extends Table
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

        $this->setTable('entidades');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('AuditStash.AuditLog');

        $this->hasMany('History', ['className' => 'AuditLogs'])
            //->setTarget(TableRegistry::getTableLocator()->get('History', ['table']))
            ->setForeignKey('primary_key')
            ->setConditions(['History.source' => 'entidades']);

        //$this
        //    ->hasMany('Audit', [
        //    'className' => 'AuditLogs',
        //    'foreignKey' => 'primary_key',
        //])->setConditions(['Audit.source' => 'entidades']);

        $this->belongsTo('Grupos', [
            'foreignKey' => 'grupo_id',
            'className' => 'Ypunto/Admin.Grupos'
        ]);
        $this->hasMany('Cosas', [
            'foreignKey' => 'entidad_id',
            'className' => 'Ypunto/Admin.Cosas'
        ]);
        $this->belongsToMany('Etiquetas', [
            'foreignKey' => 'entidad_id',
            'targetForeignKey' => 'etiqueta_id',
            'joinTable' => 'etiquetas_entidades',
            'className' => 'Ypunto/Admin.Etiquetas'
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

        $validator
            ->scalar('descripcion')
            ->allowEmpty('descripcion');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 50)
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->boolean('habilitado')
            ->requirePresence('habilitado', 'create')
            ->notEmpty('habilitado');

        $validator
            ->date('fecha_nacimiento')
            ->requirePresence('fecha_nacimiento', 'create')
            ->notEmpty('fecha_nacimiento');

        $validator
            ->dateTime('fecha_hora')
            ->requirePresence('fecha_hora', 'create')
            ->notEmpty('fecha_hora');

        $validator
            ->integer('puntos')
            ->allowEmpty('puntos');

        $validator
            ->decimal('capital')
            ->allowEmpty('capital');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['grupo_id'], 'Grupos'));

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
