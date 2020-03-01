<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Banques Model
 *
 * @property \App\Model\Table\AssurancesTable&\Cake\ORM\Association\HasMany $Assurances
 * @property &\Cake\ORM\Association\HasMany $Avances
 * @property \App\Model\Table\CreditsTable&\Cake\ORM\Association\HasMany $Credits
 * @property \App\Model\Table\EmployesTable&\Cake\ORM\Association\HasMany $Employes
 * @property \App\Model\Table\EpargnesTable&\Cake\ORM\Association\HasMany $Epargnes
 *
 * @method \App\Model\Entity\Banque get($primaryKey, $options = [])
 * @method \App\Model\Entity\Banque newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Banque[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Banque|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Banque saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Banque patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Banque[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Banque findOrCreate($search, callable $callback = null, $options = [])
 */
class BanquesTable extends Table
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

        $this->setTable('banques');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Assurances', [
            'foreignKey' => 'banque_id',
        ]);
        $this->hasMany('Avances', [
            'foreignKey' => 'banque_id',
        ]);
        $this->hasMany('Employes', [
            'foreignKey' => 'banque_id',
        ]);
        $this->hasMany('Epargnes', [
            'foreignKey' => 'banque_id',
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
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        return $validator;
    }
}
