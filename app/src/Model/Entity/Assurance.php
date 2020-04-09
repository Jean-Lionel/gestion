<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Assurance Entity
 *
 * @property int $id
 * @property string $name
 * @property int $variable_id
 * @property string $compte
 * @property int $matricule
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $periode
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Variable $variable
 * @property \App\Model\Entity\Fonction[] $fonctions
 */
class Assurance extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [

        'variable_id' => true,
        'matricule' => true,
        'montant' => true,
        'periode' => true,
        'created' => true,
        'modified' => true,
        'variable' => true,
        'fonctions' => true,
    ];
}
