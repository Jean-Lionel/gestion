<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Avances Model
 *
 * @property \App\Model\Table\VariablesTable&\Cake\ORM\Association\BelongsTo $Variables
 *
 * @method \App\Model\Entity\Avance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Avance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Avance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Avance|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Avance saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Avance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Avance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Avance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AvancesTable extends Table
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

        $this->setTable('avances');
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

        // $validator
        //     ->scalar('compte')
        //     ->maxLength('compte', 255)
        //     ->requirePresence('compte', 'create')
        //     ->notEmptyString('compte');

        $validator
            ->numeric('montant_moi')
            ->requirePresence('montant_moi', 'create')
            ->notEmptyString('montant_moi');

        // $validator
        //     ->numeric('montant_restant')
        //     ->requirePresence('montant_restant', 'create')
        //     ->notEmptyString('montant_restant');

        $validator
            ->numeric('montant')
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        $validator
            ->integer('periode')
            ->requirePresence('periode', 'create')
            ->notEmptyString('periode');

        $validator
            ->date('date_avance')
            ->requirePresence('date_avance', 'create')
            ->notEmptyDate('date_avance');

        $validator
            ->date('date_fin')
            ->requirePresence('date_fin', 'create')
            ->notEmptyDate('date_fin');

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
