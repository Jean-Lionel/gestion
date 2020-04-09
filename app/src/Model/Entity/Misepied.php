<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Misepied Entity
 *
 * @property int $id
 * @property int $matricule
 * @property float $montant
 * @property string $motif
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Misepied extends Entity
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
        'motif' => true,
        'created' => true,
        'modified' => true,
        'nombre_jour' => true,
    ];
}
