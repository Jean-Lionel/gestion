<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Indeminites Model
 *
 * @property \App\Model\Table\AjustementsTable&\Cake\ORM\Association\HasMany $Ajustements
 * @property \App\Model\Table\FonctionsTable&\Cake\ORM\Association\BelongsToMany $Fonctions
 *
 * @method \App\Model\Entity\Indeminite get($primaryKey, $options = [])
 * @method \App\Model\Entity\Indeminite newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Indeminite[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Indeminite|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Indeminite saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Indeminite patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Indeminite[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Indeminite findOrCreate($search, callable $callback = null, $options = [])
 */
class IndeminitesTable extends Table
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

        $this->setTable('indeminites');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Ajustements', [
            'foreignKey' => 'indeminite_id',
        ]);
        $this->belongsToMany('Fonctions', [
            'foreignKey' => 'indeminite_id',
            'targetForeignKey' => 'fonction_id',
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
            ->integer('is_activated')
            ->notEmptyString('is_activated');

        return $validator;
    }
}
