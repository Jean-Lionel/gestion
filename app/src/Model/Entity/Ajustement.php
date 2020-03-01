<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ajustement Entity
 *
 * @property int $id
 * @property int $ancienete_id
 * @property int $category_id
 * @property int $indeminite_id
 * @property float $prafond
 * @property float $montant
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $name
 *
 * @property \App\Model\Entity\Ancienete $ancienete
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Indeminite $indeminite
 */
class Ajustement extends Entity
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
        'ancienete_id' => true,
        'category_id' => true,
        'indeminite_id' => true,
        'prafond' => true,
        'montant' => true,
        'created' => true,
        'modified' => true,
       // 'name' => true,
        'ancienete' => true,
        'category' => true,
        'indeminite' => true,
    ];
}
