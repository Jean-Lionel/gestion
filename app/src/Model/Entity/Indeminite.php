<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Indeminite Entity
 *
 * @property int $id
 * @property string $name
 * @property int $is_activated
 *
 * @property \App\Model\Entity\Ajustement[] $ajustements
 * @property \App\Model\Entity\Fonction[] $fonctions
 */
class Indeminite extends Entity
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
        'is_activated' => true,
        'ajustements' => true,
        'fonctions' => true,
    ];
}
