<?php
require_once('./config/getDate.php');
require_once('./config/calcule.php');
//matricule=&nombre_jour=cool&motif=90000

if(isset($_GET)){

	//function permettant de calculer le montant de mise a pied d'un employer
	$db = connexion();

	$matricule = $_GET['matricule'];

	$employe =  find_employe_by_matricule($employes, $matricule);

	if($employe != null){
		$montant = $employe['net_a_payer'] * $_GET['nombre_jour'] /30;

		$q = 
		"INSERT INTO `misepieds`(`matricule`, 
		`montant`, 
		periode,
		`nombre_jour`, 
		`motif`) 
		VALUES (:matricule, :montant , :periode ,:nombre_jour , :motif)";


		$query = $db->prepare($q);

		$result = $query->execute([
			':matricule'=> $matricule, 
			':montant' => $montant,
			':periode' => date('Y-m-d'), 
			':nombre_jour' => $_GET['nombre_jour'], 
			':motif'=>$_GET['motif']

		]);

		if($result){
			echo "success";
		}else{
			echo "error";
		}

	}else{
		echo 'error';
	}

	

}