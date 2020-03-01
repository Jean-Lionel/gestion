<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Epargnes Model
 *
 * @property \App\Model\Table\BanquesTable&\Cake\ORM\Association\BelongsTo $Banques
 *
 * @method \App\Model\Entity\Epargne get($primaryKey, $options = [])
 * @method \App\Model\Entity\Epargne newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Epargne[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Epargne|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Epargne saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Epargne patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Epargne[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Epargne findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EpargnesTable extends Table
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

        $this->setTable('epargnes');
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
