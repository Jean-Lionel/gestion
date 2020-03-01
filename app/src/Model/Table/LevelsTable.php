<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Levels Model
 *
 * @property \App\Model\Table\EmployesTable&\Cake\ORM\Association\HasMany $Employes
 *
 * @method \App\Model\Entity\Level get($primaryKey, $options = [])
 * @method \App\Model\Entity\Level newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Level[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Level|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Level patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Level[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Level findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LevelsTable extends Table
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

        $this->setTable('levels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Employes', [
            'foreignKey' => 'level_id',
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
            ->numeric('base_salary')
            ->requirePresence('base_salary', 'create')
            ->notEmptyString('base_salary');

        return $validator;
    }
}
