<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Retraite Entity
 *
 * @property int $id
 * @property int $age
 * @property string $name
 * @property bool $actif
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Retraite extends Entity
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
        'age' => true,
        'name' => true,
        'actif' => true,
        'created' => true,
        'modified' => true,
    ];
}
