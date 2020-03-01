<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Level Entity
 *
 * @property int $id
 * @property string $name
 * @property float $base_salary
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employe[] $employes
 */
class Level extends Entity
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
        'name' => true,
        'base_salary' => true,
        'created' => true,
        'modified' => true,
        'employes' => true,
    ];
}
