<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Credit Entity
 *
 * @property int $id
 * @property int $matricule
 * @property \Cake\I18n\FrozenDate $periode
 * @property float $montant
 * @property int $variable_id
 * @property string $compte
 * @property float $montant_Moi
 * @property int $periode_paiement
 * @property float $montant_restant
 * @property \Cake\I18n\FrozenDate $date_credit
 * @property \Cake\I18n\FrozenDate $date_fin
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Variable $variable
 */
class Credit extends Entity
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
        'periode' => true,
        'montant' => true,
        'variable_id' => true,
        //'compte' => true,
        'montant_Moi' => true,
        'periode_paiement' => true,
        //'montant_restant' => true,
        'date_credit' => true,
        'date_fin' => true,
        'created' => true,
        'modified' => true,
        'variable' => true,
    ];
}
