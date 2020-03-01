<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fonctions Model
 *
 * @property \App\Model\Table\EmployesTable&\Cake\ORM\Association\HasMany $Employes
 * @property \App\Model\Table\AssurancesTable&\Cake\ORM\Association\BelongsToMany $Assurances
 * @property \App\Model\Table\IndeminitesTable&\Cake\ORM\Association\BelongsToMany $Indeminites
 *
 * @method \App\Model\Entity\Fonction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fonction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fonction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fonction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fonction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fonction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fonction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fonction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FonctionsTable extends Table
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

        $this->setTable('fonctions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Employes', [
            'foreignKey' => 'fonction_id',
        ]);
        $this->belongsToMany('Assurances', [
            'foreignKey' => 'fonction_id',
            'targetForeignKey' => 'assurance_id',
            'joinTable' => 'assurances_fonctions',
        ]);
        $this->belongsToMany('Indeminites', [
            'foreignKey' => 'fonction_id',
            'targetForeignKey' => 'indeminite_id',
            'joinTable' => 'fonctions_indeminites',
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
            ->numeric('prime')
            ->requirePresence('prime', 'create')
            ->notEmptyString('prime');

        return $validator;
    }
}
