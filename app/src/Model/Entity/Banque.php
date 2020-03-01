<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Banque Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property \App\Model\Entity\Assurance[] $assurances
 * @property \App\Model\Entity\Avance[] $avance
 * @property \App\Model\Entity\Employe[] $employes
 * @property \App\Model\Entity\Epargne[] $epargnes
 * @property \App\Model\Entity\Credit[] $credits
 */
class Banque extends Entity
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
        'description' => true,
        'assurances' => true,
        'avances' => true,
        'employes' => true,
        'epargnes' => true,
        'credits' => true,
    ];
}
