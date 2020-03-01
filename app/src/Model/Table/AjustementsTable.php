<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ajustements Model
 *
 * @property \App\Model\Table\AncienetesTable&\Cake\ORM\Association\BelongsTo $Ancienetes
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\IndeminitesTable&\Cake\ORM\Association\BelongsTo $Indeminites
 *
 * @method \App\Model\Entity\Ajustement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ajustement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ajustement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ajustement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ajustement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ajustement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ajustement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ajustement findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AjustementsTable extends Table
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

        $this->setTable('ajustements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ancienetes', [
            'foreignKey' => 'ancienete_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Indeminites', [
            'foreignKey' => 'indeminite_id',
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
            ->numeric('prafond')
            ->requirePresence('prafond', 'create')
            ->notEmptyString('prafond');

        $validator
            ->numeric('montant')
            ->requirePresence('montant', 'create')
            ->notEmptyString('montant');

       /* $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');
        */

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
        $rules->add($rules->existsIn(['ancienete_id'], 'Ancienetes'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['indeminite_id'], 'Indeminites'));

        return $rules;
    }
}
