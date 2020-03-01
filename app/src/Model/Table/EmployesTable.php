<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employes Model
 *
 * @property \App\Model\Table\LevelsTable&\Cake\ORM\Association\BelongsTo $Levels
 * @property \App\Model\Table\AgencesTable&\Cake\ORM\Association\BelongsTo $Agences
 * @property \App\Model\Table\FonctionsTable&\Cake\ORM\Association\BelongsTo $Fonctions
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\BanquesTable&\Cake\ORM\Association\BelongsTo $Banques
 * @property \App\Model\Table\CotationsTable&\Cake\ORM\Association\HasMany $Cotations
 *
 * @method \App\Model\Entity\Employe get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employe newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employe[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employe|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employe saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employe patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employe[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employe findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployesTable extends Table
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

        $this->setTable('employes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Agences', [
            'foreignKey' => 'agence_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Fonctions', [
            'foreignKey' => 'fonction_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Banques', [
            'foreignKey' => 'banque_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Cotations', [
            'foreignKey' => 'employe_id',
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
            ->notEmptyString('matricule')
            ->add('matricule', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nom')
            ->maxLength('nom', 255)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        $validator
            ->scalar('prenom')
            ->maxLength('prenom', 255)
            ->requirePresence('prenom', 'create')
            ->notEmptyString('prenom');

        $validator
            ->date('dateNaissance')
            ->requirePresence('dateNaissance', 'create')
            ->notEmptyDate('dateNaissance');

        $validator
            ->scalar('sexe')
            ->maxLength('sexe', 255)
            ->requirePresence('sexe', 'create')
            ->notEmptyString('sexe');

        $validator
            ->scalar('etatCivil')
            ->maxLength('etatCivil', 255)
            ->requirePresence('etatCivil', 'create')
            ->notEmptyString('etatCivil');
        $validator
            ->integer('conjointFonction')
            ->requirePresence('conjointFonction', 'create')
            ->notEmptyString('conjointFonction');

       /* $validator
            ->scalar('telephone')
            ->maxLength('telephone', 255)
            ->requirePresence('telephone', 'create')
            ->notEmptyString('telephone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create');
        */
            

        $validator
            ->integer('nombreEnfant')
            ->requirePresence('nombreEnfant', 'create')
            ->notEmptyString('nombreEnfant');

        $validator
            ->numeric('salaireBase')
            ->requirePresence('salaireBase', 'create')
            ->notEmptyString('salaireBase');

        $validator
            ->scalar('compte')
            ->maxLength('compte', 255)
            ->requirePresence('compte', 'create')
            ->notEmptyString('compte');

        $validator
            ->date('dateEmbauche')
            ->requirePresence('dateEmbauche', 'create')
            ->notEmptyDate('dateEmbauche');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['matricule']));
        $rules->add($rules->existsIn(['level_id'], 'Levels'));
        $rules->add($rules->existsIn(['agence_id'], 'Agences'));
        $rules->add($rules->existsIn(['fonction_id'], 'Fonctions'));
        $rules->add($rules->existsIn(['service_id'], 'Services'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['banque_id'], 'Banques'));

        return $rules;
    }
}
