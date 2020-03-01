<?php

require_once 'database.php';

//Define constante

define('INDEMINITE_DEPLACEMENT', 10000);
define('BASE_SALAIRE_BRUT', 450000);

//function for vardump
function affiche($value = null)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}


function afficheNombre($nomber){

    return number_format($nomber,0,",",".");
}

/**
 * nameForTable_id
 * la fonction retourne le nom
 * relative la id donnes et la table
 */
//$db = connexion();

function nameForTable_id($id, $tables)
{
    $db = connexion();
    $fonctionData = $db->query('SELECT * FROM ' . $tables . ' WHERE id = ' . $id);
    $rep = $fonctionData->fetch();
    $fonctionData->closeCursor();
    return $rep;
}

function getEncientete_id($anne)
{
    $db = connexion();
    $anciente = $db->query('SELECT id FROM ancienetes WHERE fin >=' . $anne . ' LIMIT 1');
    $id = $anciente->fetch();
    $anciente->closeCursor();
    return $id['id'];
}
/**
 * $anciente_id, Enciente de l'employes
 * $category_id : category de l'employes
 * SELECT * FROM ajustements inner join ancienetes
 *  on ancienetes.id = ajustements.ancienete_id
 * WHERE ancienetes.debut>=7 AND ajustements.category_id = 2
 *
 *
 */

function get_ajustement($anciente_id, $category_id)
{

    $db = connexion();
    $result = $db->query('SELECT * FROM `ajustements` WHERE `ancienete_id` = ' . $anciente_id . ' AND `category_id` = ' . $category_id . ' LIMIT 1');
    $ajustement = $result->fetch();

    $result->closeCursor();
    return $ajustement;
}

// affiche(get_ajustement(1,2));
// die();
/***
 *
 * octoyer ajustement
 * la fonction que je devrait utiliser pour 
 * octoyer une ajustement 
 * Mais par tricherie 
 *
 * on 
 */



// function octoyerAjustement_tricher($matricule){

//     $db = connexion();

//     $q = 'SELECT SUM(montant) as ajustement FROM backups_ajustements WHERE matricule = '.$matricule;

//     $result = $db->query($q);

//     $montant = $result->fetch();

//     $result->closeCursor();
//     return $montant['ajustement'];

// }

/**
 * La vrai function a utiliser apres 
 */

function octoyerAJustement($ajustement, $bruts, $matricule)
{
    $ajustement_get = 0;
    // if ($ajustement && $bruts < $ajustement['prafond']) {

    //     $sumTotal = $bruts + $ajustement['montant'];

    //      if($sumTotal >= $ajustement['prafond']){

    //          $ajustement_get = $ajustement['prafond'] - $bruts;
    //      }

    //     $ajustement_get = $ajustement['montant'];
    // }

    if($bruts <= $ajustement['prafond']){
        $ajustement_get = $ajustement['montant'];

    }else{
        $sumTotal = $ajustement['prafond'] + $ajustement['montant'];

        if($bruts <= $sumTotal){
            $ajustement_get = $sumTotal - $bruts;
        }

        // if($bruts > $ajustement['prafond']){
        //     $ajustement_get = $sumTotal - $bruts;

        //     if( $ajustement_get  < 0){
        //         $ajustement_get  = 0;
        //     }
        // }
    }


    $db = connexion();
    $q = 'SELECT SUM(montant) as ajustement FROM backups_ajustements WHERE matricule = '.$matricule;

    $result = $db->query($q);

    $montant = $result->fetch();

    $result->closeCursor();
    $montant_Anne_anterieur =  $montant['ajustement'];

    return $ajustement_get + $montant_Anne_anterieur;
}

/**
 * CALCUL INSS EMPLOYER
 */

/**
 * Calcule inss chez l'employeur
 *
 *
 *
 */

function inssChezEmployeur($brut1, $allocation_familial)
{
    $pension_employeur = 0;
    $risque_employeur = 0;
    $risque_employeur = 2400;
    $base_pension_employeur = $brut1 - $allocation_familial;

    if ($brut1 < 450000) {
        $pension_employeur = $base_pension_employeur * 6 / 100;
    } else {
        $pension_employeur = 450000 * 6 / 100;
    }

    if ($base_pension_employeur <= 80000) {
        $risque_employeur = $base_pension_employeur * 3 / 100;
    }

    $inessEmployeur = $pension_employeur + $risque_employeur;
    
    return $inessEmployeur;
}


/**
 * Calculer IPR
 */

function calculer_ipr($base_ipr){
    $ipr = 0;
    //$base_ipr >=0 && 
    //$base_ipr >150000 && 
    
    if($base_ipr <=150000){
        $ipr = 0; //Ipr reste a zero
    }
    else if($base_ipr <=300000){
        $ipr = ($base_ipr - 150000) *20 /100;
    }else{
     $ipr = 30000 + ($base_ipr - 300000) *30 /100;
 }

 return $ipr;

}

/**
 * Calculer de Assurance Mensuel
 * Epargne 
 *
 * total_autre_retenu = total_epargne + total_avance + total_credit + total_assurance
 *
 * total_retenu = retenu(ipr + inss_employer + mutuel_employer) + retenu_autre_retenu
 *
 * N.B : RETENU = ipr + inss_employe + mutuel_employer
 *
 * Total_depenses = total_retenu + net_a_payer + inss_patronal +mft_patronal
 *
 * Net a payer = Salaire_Brut - total_retenu - tatal_mise_pied 
 * 
 */

function calcule_epargne($matricule, $periode){
    $db = connexion();

    $q = 'SELECT SUM(montant) as epargnes_total
    FROM `epargnes` WHERE matricule = '.$matricule.
    ' AND MONTH(periode) = '.$periode['mois'].' AND YEAR(periode) = '. $periode['annee'];

    $result = $db->query($q);

    $epargnes_total = $result->fetch();

    $result->closeCursor();
    return floatval($epargnes_total['epargnes_total']);

}

//var_dump(calcule_epargne(7,['mois'=>1,'annee'=>2020]));


//SELECT * FROM `avances` WHERE matricule = 396 AND YEAR(`date_fin`)=2020 AND MONTH(`date_fin`)=4


function calcule_avances($matricule, $periode){
 $db = connexion();
 $q = 'SELECT SUM(montant_moi) as montant_moi FROM `avances` WHERE matricule = '.$matricule.' AND YEAR(`date_fin`) >= '. $periode['annee'] .' AND MONTH(`date_fin`) >='. $periode['mois'];
 $result = $db->query($q);
 $montant_avance = $result->fetch();

 $result->closeCursor();
 return floatval($montant_avance['montant_moi']);
}


// SELECT SUM(montant_Moi)
// FROM credits
// WHERE date_fin >= '2020-02-01'
//   AND date_fin < '2025-11-10' + interval 1 day and matricule= 99

function calcule_credit($matricule, $periode){
 $db = connexion();
   // $q = 'SELECT SUM(montant_moi) as montant_moi FROM `credits` 
   // WHERE matricule = '.$matricule.' AND YEAR(`date_fin`) >= '. $periode['annee'] .' AND MONTH(`date_fin`) <='. $periode['mois'];

 $dateActuel = $periode['annee'].'-'.$periode['mois'].'-'.'01';


 $q = "
 SELECT SUM(montant_Moi) as montant_moi
 FROM credits
 WHERE date_fin >= '". $dateActuel."' + interval 1 day AND matricule=".$matricule;

  // var_dump($q);
  // die();

 $result = $db->query($q);
 $montant_avance = $result->fetch();

 $result->closeCursor();
 return floatval($montant_avance['montant_moi']);

}

//Calculer assurance Total

function calcul_assurance($matricule, $periode){
    $db = connexion();

    $q = 'SELECT SUM(montant) as montant FROM assurances
    WHERE matricule = '.$matricule.' AND YEAR(periode) = '.$periode['annee'] .' AND MONTH(periode)= '. $periode['mois'];

    $result = $db->query($q);

    $montant = $result->fetch();

    $result->closeCursor();
    return floatval($montant['montant']);

}

//Calculer Mise Pieds 

function calcul_misepied($matricule, $periode){
    $db = connexion();

    $q = 'SELECT SUM(montant) as montant FROM misepieds
    WHERE matricule = '.$matricule.' AND YEAR(periode) = '.$periode['annee'] .' AND MONTH(periode)= '. $periode['mois'];

    $result = $db->query($q);

    $montant = $result->fetch();

    $result->closeCursor();

    return floatval($montant['montant']);

}

//Total_depenses = total_retenu + net_a_payer + inss_patronal +mft_patronal

//Recchercher de net a payer dans la tables des employes 


function net_a_payer($employes, $matricule){

    foreach ($employes as $key => $employe) 
        if($employe['matricule'] == $matricule)
            return $employe['net_a_payer'];

        return 0;

    }

//ordre de virement functions
/**
 * Ordre de virement 
 */

function ordreVirement($employes_table_paiement = array()){
    $employes_ordre_virement = [];
    $db = connexion();

    $q = 'SELECT e.compte as compte, e.nom as nom,e.prenom as prenom 
    ,e.matricule as matricule ,
    b.name as banque_name, 
    b.id as banque_id FROM employes e 
    JOIN banques b ON e.banque_id = b.id ORDER BY b.name ASC';

    $result = $db->query($q);

    while ($data = $result->fetch()) {
        $employe = [];

        $employe['compte'] = $data['compte'];
        $employe['nom'] = $data['nom'];
        $employe['prenom'] = $data['prenom'];
        $employe['banque_name'] = $data['banque_name'];
        $employe['banque_id'] = $data['banque_id'];
        $employe['montant'] = net_a_payer($employes_table_paiement, $data['matricule']);

        $employes_ordre_virement[] = $employe;

    }

    return $employes_ordre_virement;   
}

//Mituel de la fonnction public 


function mituel_get_file($employes){
    $mituel_function = [];

    foreach ($employes as $key => $employe) {
        $employe_tab = [];
        $employe_tab['matricule'] = $employe['matricule'];
        $employe_tab['nom'] = $employe['nom'];
        $employe_tab['prenom'] = $employe['prenom'];

        $employe_tab['base'] = $employe['salaireBase'] + $employe['ind_deplacement'] + $employe['prime_Fonction'] ;
        $employe_tab['mituel_employeur_Patronal'] = $employe['mituel_employeur_Patronal'];
        $employe_tab['mutuel_employe'] = $employe['mutuel_employe'];
        $employe_tab['montant'] = $employe['mutuel_employe'] +  $employe_tab['mituel_employeur_Patronal'];

        $mituel_function[] = $employe_tab;

    }

    return  $mituel_function;
}

/**
 * la function calculant les infos des impots
 */

function ipr_get_file($employes){
    $tab_ipr = [];

    foreach ($employes as $key => $employe) {
        $employe_tab = [];
        $employe_tab['matricule'] = $employe['matricule'];
        $employe_tab['nom'] = $employe['nom'];
        $employe_tab['prenom'] = $employe['prenom'];
        $employe_tab['ipr'] = $employe['ipr'];
        $employe_tab['base_ipr'] = $employe['base_ipr'];

        $tab_ipr[] = $employe_tab;
    }

    return $tab_ipr;

}


//Regularisations des employes

/**
 * fiche de regularisation
 * [regularisation_get_file description]
 * @param  [type] $employes [description]
 * @return [type]           [description]
 */
function regularisation_get_file($employes){
    $employes_list = [];

    foreach ($employes as $key => $value) {
        $employe = [];

        $employe['matricule'] = $value['matricule'];
        $employe['nom'] = $value['nom'];
        $employe['prenom'] = $value['prenom'];
        $employe['date_embauche'] = $value['date_embauche'];

        $employe['ancienete'] = $value['ancienete'];
        $employe['salaire_brut_sans_ajustement'] = $value['salaire_brut_sans_ajustement'];
       // $employe['salaire_brut_sans_ajustement'] = $value['salaire_brut_sans_ajustement'];

        $employe['ind_ajustement'] = $value['ind_ajustement'];
        $employe['category_name'] = $value['category_name'];

        if($employe['ind_ajustement']  > 0 ){
            $employes_list[] = $employe;
        }
        

    }


    return $employes_list;
}


function autre_retenue_get_file($employes){
    $employes_list = [];

    foreach ($employes as $key => $value) {
        $employe = [];

        $employe['matricule'] = $value['matricule'];
        $employe['nom'] = $value['nom'];
        $employe['prenom'] = $value['prenom'];
        $employe['total_autre_retenu'] = $value['total_autre_retenu'];
        $employe['prenom'] = $value['prenom'];

        if($employe['ind_ajustement']  > 0 ){
            $employes_list[] = $employe;
        }
        

    }


    return $employes_list;
}

//function 
//retournant la total des elements d ' un tableu



function count_sum_colonne_table($tables , $key_value){
    $result = 0;

    foreach ($tables as $key => $value) 
        $result += round($value[$key_value]);

    return $result;
}

/**
* La fonction returner le tableau ordonner selon le choix 
*

*/

function order_table_by_key($table , $key_word){
    $dataOrdonner = [];

    foreach ($table as $key => $value) {
        
        $keyName = $value[$key_word];
        $tab=[];

        foreach ($table as $key => $var) {
            if($var[$key_word] == $keyName){
                $tab[] = $var;
                unset($table[$key]);

            }
        }

        if(!empty($tab))
            $dataOrdonner[] = $tab;
    }

    return $dataOrdonner;
}


function get_file_iness($employes){
    $dataTable = [];
}