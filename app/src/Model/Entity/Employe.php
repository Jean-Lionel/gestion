<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employe Entity
 *
 * @property int $id
 * @property int $matricule
 * @property string $nom
 * @property string $prenom
 * @property \Cake\I18n\FrozenDate $dateNaissance
 * @property string $sexe
 * @property string $etatCivil
 * @property int $level_id
 * @property float $base_salary
 * @property int $conjointFonction
 * @property string $telephone
 * @property string $email
 * @property int $nombreEnfant
 * @property float $salaireBase
 * @property int $agence_id
 * @property int $fonction_id
 * @property int $service_id
 * @property int $category_id
 * @property int $banque_id
 * @property string $compte
 * @property \Cake\I18n\FrozenDate $dateEmbauche
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $etat
 *
 * @property \App\Model\Entity\Level $level
 * @property \App\Model\Entity\Agence $agence
 * @property \App\Model\Entity\Fonction $fonction
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Banque $banque
 * @property \App\Model\Entity\Cotation[] $cotations
 */
class Employe extends Entity
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
        'nom' => true,
        'prenom' => true,
        'dateNaissance' => true,
        'sexe' => true,
        'etatCivil' => true,
        'level_id' => true,
        'conjointFonction' => true,
        'telephone' => true,
        'email' => true,
        'nombreEnfant' => true,
        'salaireBase' => true,
        'agence_id' => true,
        'fonction_id' => true,
        'service_id' => true,
        'category_id' => true,
        'banque_id' => true,
        'compte' => true,
        'dateEmbauche' => true,
        'created' => true,
        'modified' => true,
        'etat' => true,
        'level' => true,
        'agence' => true,
        'fonction' => true,
        'service' => true,
        'category' => true,
        'banque' => true,
        'cotations' => true,
    ];
}
