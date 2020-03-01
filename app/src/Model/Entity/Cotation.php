<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cotation Entity
 *
 * @property int $id
 * @property int $employe_id
 * @property float $points
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employe $employe
 */
class Cotation extends Entity
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
        'employe_id' => true,
        'points' => true,
        'created' => true,
        'modified' => true,
        'employe' => true,
    ];
}
