<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Variables Model
 *
 * @property &\Cake\ORM\Association\HasMany $Epargnes
 *
 * @method \App\Model\Entity\Variable get($primaryKey, $options = [])
 * @method \App\Model\Entity\Variable newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Variable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Variable|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Variable saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Variable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Variable[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Variable findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class VariablesTable extends Table
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

        $this->setTable('variables');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Epargnes', [
            'foreignKey' => 'variable_id',
        ]);
         $this->hasMany('Credits', [
            'foreignKey' => 'variable_id',
        ]);

         $this->hasMany('Assurances',[
            'foreignKey' => 'variable_id',
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('abreviation')
            ->maxLength('abreviation', 255)
            ->requirePresence('abreviation', 'create')
            ->notEmptyString('abreviation');

        return $validator;
    }

    public function beforeFind($event, $query, $options, $primary)
    {
    // if ->applyOptions(['default' => false]) not use default conditions
    if(isset($options['default']) && $options['default'] == false){
        return $query;
    }
    $query->where(['Variables.name NOT LIKE' => '%kcb%']);
    $query->order(['Variables.name' => 'ASC']);

    return $query;
    }   
}
