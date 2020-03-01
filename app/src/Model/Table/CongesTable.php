<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conges Model
 *
 * @method \App\Model\Entity\Conge get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conge newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conge[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conge|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conge saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conge patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conge[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conge findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CongesTable extends Table
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

        $this->setTable('conges');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('nbre_jour')
            ->requirePresence('nbre_jour', 'create')
            ->notEmptyString('nbre_jour');

        $validator
            ->integer('etat')
            ->requirePresence('etat', 'create')
            ->notEmptyString('etat');

        return $validator;
    }
}
