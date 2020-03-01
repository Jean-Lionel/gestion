<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Epargne Entity
 *
 * @property int $id
 * @property int $matricule
 * @property float $montant
 * @property \Cake\I18n\FrozenDate $periode
 * @property int $banque_id
 * @property string $compte
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Banque $banque
 */
class Epargne extends Entity
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
        'montant' => true,
        'periode' => true,
        'variable_id' => true,
        // 'compte' => true,
        'created' => true,
        'modified' => true,
        // 'banque' => true,
    ];
}
