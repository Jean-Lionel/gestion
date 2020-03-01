<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ancienetes Model
 *
 * @property \App\Model\Table\AjustementsTable&\Cake\ORM\Association\HasMany $Ajustements
 *
 * @method \App\Model\Entity\Ancienete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ancienete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ancienete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ancienete|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ancienete saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ancienete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ancienete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ancienete findOrCreate($search, callable $callback = null, $options = [])
 */
class AncienetesTable extends Table
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

        $this->setTable('ancienetes');
        
        $this->setDisplayField('debut');
        $this->setPrimaryKey('id');

        $this->hasMany('Ajustements', [
            'foreignKey' => 'ancienete_id',
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
            ->integer('debut')
            ->requirePresence('debut', 'create')
            ->notEmptyString('debut');

        $validator
            ->integer('fin')
            ->requirePresence('fin', 'create')
            ->notEmptyString('fin');

        return $validator;
    }
}
