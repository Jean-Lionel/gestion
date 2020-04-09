<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assurances Model
 *
 * @property \App\Model\Table\VariablesTable&\Cake\ORM\Association\BelongsTo $Variables
 * @property \App\Model\Table\FonctionsTable&\Cake\ORM\Association\BelongsToMany $Fonctions
 *
 * @method \App\Model\Entity\Assurance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assurance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assurance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assurance|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assurance saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assurance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assurance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assurance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AssurancesTable extends Table
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

        $this->setTable('assurances');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Variables', [
            'foreignKey' => 'variable_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Fonctions', [
            'foreignKey' => 'assurance_id',
            'targetForeignKey' => 'fonction_id',
            'joinTable' => 'assurances_fonctions',
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
            ->numeric('montant')
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

        $validator
            ->date('periode')
            ->requirePresence('periode', 'create')
            ->notEmptyDate('periode');

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
