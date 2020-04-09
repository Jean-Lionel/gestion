<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Misepieds Model
 *
 * @method \App\Model\Entity\Misepied get($primaryKey, $options = [])
 * @method \App\Model\Entity\Misepied newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Misepied[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Misepied|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Misepied saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Misepied patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Misepied[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Misepied findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MisepiedsTable extends Table
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

        $this->setTable('misepieds');
        $this->setDisplayField('id');
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
            ->integer('matricule')
            ->requirePresence('matricule', 'create')
            ->notEmptyString('matricule');

        // $validator
        //     ->numeric('montant')
        //     ->requirePresence('montant', 'create')
        //     ->notEmptyString('montant');

        $validator
            ->scalar('motif')
            ->maxLength('motif', 255)
            ->requirePresence('motif', 'create')
            ->notEmptyString('motif');

        $validator
            ->integer('nombre_jour');


        return $validator;
    }


    public function beforeSave($event, $entity, $options) {

     

}
}
