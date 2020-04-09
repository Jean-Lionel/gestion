<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Avance Entity
 *
 * @property int $id
 * @property int $matricule
 * @property string $compte
 * @property int $variable_id
 * @property float $montant_moi
 * @property float $montant_restant
 * @property float $montant
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $periode
 * @property \Cake\I18n\FrozenDate $date_avance
 * @property \Cake\I18n\FrozenDate $date_fin
 *
 * @property \App\Model\Entity\Variable $variable
 */
class Avance extends Entity
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
        'matricule' => true,
        //'compte' => true,
        'variable_id' => true,
        'montant_moi' => true,
        // 'montant_restant' => true,
        'montant' => true,
        'created' => true,
        'modified' => true,
        'periode' => true,
        'date_avance' => true,
        'date_fin' => true,
        'variable' => true,
    ];
}
