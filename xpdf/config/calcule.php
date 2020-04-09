<?php
require_once 'database.php';
require_once 'functions.php';


$employes = getEmployesData($periodeGet);
// indeminite_logement =Indeminité de logement=ind_log=(salaire de base*50)/100

// affiche($employes[0]);
// die();

if($employes == null){
    echo "<b>Erreur nous n' avons pas les données de   " . $periodeGet['mois'] .
    '  / '. $periodeGet['annee'].'</b>';

    die();
}

// savehistory($employes);
// die();

foreach ($employes as $key => $employe) {
    $matricule = $employe['matricule'];

    $periode = $periodeGet;
    //initialisation de la periode
    $employes[$key]['periode'] = $periode;

    $indeminite_logement = ($employe['salaireBase'] * 50) / 100;
    $ind_deplacement = 0;

    $employes[$key]['logement'] = $indeminite_logement;

    //Indeminité de Deplacement=ind_deplacement=10000 sauf pour les cadres de direction
    // qui ont des voitures doc qui leurs fonctions sont : DG, DAF,DTA,DTH

    $fonctionNotAllowed = ['DG', 'DAF', 'DTA', 'DTH', 'DIRECTEUR GENERAL'];

    $nomFonction = nameForTable_id($employe['fonction_id'], 'fonctions');

    if (in_array(mb_strtoupper($nomFonction['name']), $fonctionNotAllowed)) {
        $employes[$key]['ind_deplacement'] = 0;
    } else {
        $employes[$key]['ind_deplacement'] = INDEMINITE_DEPLACEMENT;
        $ind_deplacement = INDEMINITE_DEPLACEMENT;
    }

    /**
     *  all_familial=(1000 X nombre_enfant)+2000 si le conjoint de l’employé n’est salarié
     *  all_familial=(1000 X nombre_enfant) si le conjoint de l’employé est salarié
     * all_familial=0 pour un celibataire
     */
    $all_familial = 0;
    if ($employe['etatCivil'] == 'CELIBATAIRE' || $employe['etatCivil'] == '-1') {
        $employes[$key]['all_familial'] = 0;
    } else {
        $all_familial = (1000 * $employe['nombreEnfant']);

        if ($employe['conjointFonction'] == 0) {
            $all_familial = $all_familial + 2000;
        }

        $employes[$key]['all_familial'] = $all_familial;
    }

    // Aut.G =prime de fonction

    $employes[$key]['prime_Fonction'] = $nomFonction['prime'];

    //Brut1 = salaire_base+ind_log+ind_deplacement+all_familial+prime

    $brut1 = $employe['salaireBase'] + $indeminite_logement + $employes[$key]['ind_deplacement'] + $employes[$key]['all_familial'] + $nomFonction['prime'];


    $brutAJustement = $employe['salaireBase'] + $indeminite_logement + $employes[$key]['ind_deplacement'] + $employes[$key]['all_familial'];

    /**
     * Indeminite d'ajustement
     * Depend de salaire brut1
     * Anciente
     *Categorie
     *
     */

    $dateEmbauche = explode('-', $employe['dateEmbauche']);
    $anciente = date('Y') - $dateEmbauche[0];

    //Anne d'embauche  
    //Anciennete
    
    $employes[$key]['date_embauche'] = $dateEmbauche[0];
    $employes[$key]['ancienete'] =  $anciente;
    $employes[$key]['salaire_brut_sans_ajustement'] =  $brutAJustement;
    //recuperation de
    $enciente_id = getEncientete_id($anciente);

    $ajustement = get_ajustement($enciente_id, $employe['category_id']);
    //calculer indeminites ajustementd
    //octoyerAJustement($ajustement, $brut1);
    
    $ind_ajustement = octoyerAJustement($ajustement, $brutAJustement ,$matricule);

    //Salaire brut de chaque employe
    $salaire_brut = $brut1 + $ind_ajustement;

    $employes[$key]['salaire_brut_sans_ajustement'] = $brutAJustement;

    $employes[$key]['brut1'] = $salaire_brut;

    $employes[$key]['ind_ajustement'] = $ind_ajustement;
    //var_dump( );
    // affiche($ajustement['montant']);

    //Mituel

    $mituelEmploye = ($brut1 - $all_familial - $indeminite_logement) * 4 / 100;
    $employes[$key]['mutuel_employe'] = $mituelEmploye;

    //Calculer INSS
    $pension_employe = 0;
    if ($brut1 < 450000) {
        $pension_employe = ($brut1 - $all_familial) * 4 / 100;
        //La base de pension de l'employe dont la salaire inferieur 
        $employes[$key]['base_pension_employe'] = $brut1 - $all_familial;
    } else {
        $pension_employe = (450000 * 4) / 100;
         //La base de pension de l'employe dont la salaire inferieur 
        $employes[$key]['base_pension_employe'] = 450000;
    }

    $employes[$key]['pension_employe'] = $pension_employe;

    //Mituel Employeur   mutuelle employeur=(salaire_brut1-ind_log-all_familial)*6/100;

    $mituel_employeur_Patronal = ($brut1 - $indeminite_logement - $all_familial) * 6 / 100;
    $employes[$key]['mituel_employeur_Patronal'] = $mituel_employeur_Patronal;

    //calculer de CALCUL INSS EMPLOYEUR
    //pension_employeur= (salaire_brut1-all_familial)*6/100;

   // $pension_employeur = ($brut1 - $all_familial) * 6 / 100;
   

   $innss_employeur_Data = inssChezEmployeur($brut1, $all_familial);

   $innss_employeur = $innss_employeur_Data['inessEmployeur'];

    $employes[$key]['pension_employeur'] =  $innss_employeur;
    //Les autres clefs 
    $employes[$key]['base__risque_employeur'] =  $innss_employeur_Data['base__risque_employeur'];
    $employes[$key]['inss_employe'] =  $innss_employeur_Data['inss_employe'];
    $employes[$key]['montant_risque'] =  $innss_employeur_Data['montant_risque'];
    //$employes[$key]['montant_risque'] =  $innss_employeur['montant_risque'];




    //Base IPR 
    
    /**
     * Base IPR = SALAIRE BRUTE - (indemin)
     * 
    *$base_ipr = $brut1 - ($indeminite_logement + $ind_deplacement + $pension_employe + *$mituelEmploye);
     */
    
    $base_ipr = $brut1 - ($indeminite_logement + $ind_deplacement + $pension_employe + $mituelEmploye);

    $employes[$key]['base_ipr'] = $base_ipr;

    //Ipr 
    
    $ipr = calculer_ipr($base_ipr);
    
    $employes[$key]['ipr'] = calculer_ipr($base_ipr);

    //Autre retenu
    //total_autre_retenu = total_epargne + total_avance + total_credit + total_assurance
    $autres_retenus = get_autre_retenue_employes($matricule,$periode);

    //$total_autre_retenu = get_autre_retenu_total($matricule,$periode);

    $employes[$key]['total_autre_retenu'] = 
    count_sum_colonne_table($autres_retenus,'montant') + calcule_epargne($matricule, $periode) 
    + calcul_assurance($matricule, $periode);



    //total_retenu = retenu(ipr + pension_employe + mutuel_employer) + retenu_autre_retenu
    
    $total_retenu =  $ipr + $pension_employe + $mituelEmploye + $employes[$key]['total_autre_retenu'];

    $employes[$key]['total_retenu'] = $total_retenu;


    //Net a payer = Salaire_Brut - total_retenu - tatal_mise_pied 
    

   $net_a_payer = $salaire_brut - $total_retenu - calcul_misepied($matricule, $periode);

   $employes[$key]['net_a_payer'] =  $net_a_payer;


   //Total_depenses = total_retenu + net_a_payer + inss_patronal +mft_patronal
   
   $total_depenses  = $total_retenu + $net_a_payer + $innss_employeur + $mituel_employeur_Patronal;

   $employes[$key]['total_depenses'] = $total_depenses;
   //Le nom de la category
   $categorieData = nameForTable_id($employe['category_id'],'categories');
   $employes[$key]['category_name'] = $categorieData['name'];

   //Nom de la variable 

   $categorieData = nameForTable_id($employe['category_id'],'categories');
   $employes[$key]['category_name'] = $categorieData['name'];


//Recherche des retenues de chaque employes 


    $employes[$key]['base_mituel'] = $employe['salaireBase'] + $ind_deplacement + $nomFonction['prime'] ;




}


//array_keys($employes)


// $hacker = regularisation_get_file($employes);

// affiche($hacker);

//  die();


//Les total du fiche de paie


$total_salaire_base =  count_sum_colonne_table($employes, 'salaireBase');
$total_logement =  count_sum_colonne_table($employes, 'logement');
$total_ind_deplacement =  count_sum_colonne_table($employes, 'ind_deplacement');
$total_all_familial =  count_sum_colonne_table($employes, 'all_familial');
$total_ind_ajustement =  count_sum_colonne_table($employes, 'ind_ajustement');
$total_prime_Fonction =  count_sum_colonne_table($employes, 'prime_Fonction');
$total_brut1 =  count_sum_colonne_table($employes, 'brut1');
$total_pension_employe =  count_sum_colonne_table($employes, 'pension_employe');
$total_mutuel_employe =  count_sum_colonne_table($employes, 'mutuel_employe');
$total_base_ipr =  count_sum_colonne_table($employes, 'base_ipr');
$total_ipr =  count_sum_colonne_table($employes, 'ipr');
$total_total_autre_retenu =  count_sum_colonne_table($employes, 'total_autre_retenu');
$total_total_retenu =  count_sum_colonne_table($employes, 'total_retenu');
$total_net_a_payer =  count_sum_colonne_table($employes, 'net_a_payer');
$total_pension_employeur =  count_sum_colonne_table($employes, 'pension_employeur');
$total_mituel_employeur_Patronal =  count_sum_colonne_table($employes, 'mituel_employeur_Patronal');



$total_total_depenses  = round($total_pension_employe) + round($total_mutuel_employe)+
 round($total_ipr)+
    round($total_total_autre_retenu) + round($total_net_a_payer)+
                        round($total_pension_employeur) + round($total_mituel_employeur_Patronal);


//$total_total_depenses =  count_sum_colonne_table($employes, 'total_depenses');
