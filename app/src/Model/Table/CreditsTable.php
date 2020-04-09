<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Credits Model
 *
 * @property \App\Model\Table\VariablesTable&\Cake\ORM\Association\BelongsTo $Variables
 *
 * @method \App\Model\Entity\Credit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Credit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Credit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Credit|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Credit saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Credit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Credit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Credit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CreditsTable extends Table
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

        $this->setTable('credits');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Variables', [
            'foreignKey' => 'variable_id',
            'joinType' => 'INNER',
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
            ->integer('matricule')
            ->requirePresence('matricule', 'create')
            ->notEmptyString('matricule');

        $validator
            ->date('periode')
            ->requirePresence('periode', 'create')
            ->notEmptyDate('periode');

        $validator
            ->numeric('montant')
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        // $validator
        //     ->scalar('compte')
        //     ->maxLength('compte', 255)
        //     ->requirePresence('compte', 'create')
        //     ->notEmptyString('compte');

        // $validator
        //     ->numeric('montant_Moi')
        //     ->notEmptyString('montant_Moi');

        $validator
            ->integer('periode_paiement')
            ->requirePresence('periode_paiement', 'create')
            ->notEmptyString('periode_paiement');

        // $validator
        //     ->numeric('montant_restant')
        //     ->requirePresence('montant_restant', 'create')
        //     ->notEmptyString('montant_restant');

        $validator
            ->date('date_credit')
            ->requirePresence('date_credit', 'create')
            ->notEmptyDate('date_credit');

        // $validator
        //     ->date('date_fin')
        //     ->requirePresence('date_fin', 'create')
        //     ->notEmptyDate('date_fin');

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
        $rules->add($rules->existsIn(['variable_id'], 'Variables'));

        return $rules;
    }
}
