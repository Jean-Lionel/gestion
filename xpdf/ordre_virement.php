<?php
require_once('./config/getDate.php');
require_once('./config/calcule.php');

$resultat = ordreVirement($employes);



// $somme = 0;

// foreach ($resultat as $key => $value) 
// 	$somme  += $value['montant'];
	


// die(afficheNombre($somme));

// function ordonneParBanques($resultat){
// 	$dataOrdonner = [];

// 	foreach ($resultat as $key => $value) {
		
// 		$banque_name = $value['banque_name'];
// 		$tab=[];

// 		foreach ($resultat as $key => $var) {
// 			if($var['banque_name'] == $banque_name){
// 				$tab[] = $var;
// 				unset($resultat[$key]);

// 			}
// 		}

// 		if(!empty($tab))
// 			$dataOrdonner[] = $tab;
// 	}

// 	return $dataOrdonner;
// }

$ordreVirements = order_table_by_key($resultat,'banque_name');

// affiche($ordreVirements[0]);
// die();


$totalOrdreVirement = 0;


ob_start();
?>

<style>
	table{
		width: 100%;
	}

	td{
		width: 30%;
	}

	.main-table , .main-table td,.main-table th,.main-table tr{
				border-collapse: collapse;
				border: 1px solid;
			}

	.title{
		text-align: center;
		text-decoration: underline;

	}
</style>



<?php foreach ($ordreVirements as $key => $ordreVirementBanque):  ?>
				
	<page backtop="0mm" backleft="5mm" backright="5mm" footer="page">
		<?php require("include/footer.php"); ?>

	<?php require("include/header_portrait.php");?>

	<p class="title">ORDRE DE VIREMENT DES SALAIRES: <?= $ordreVirementBanque[0]['periode']['mois'] .' / ' .$ordreVirementBanque[0]['periode']['annee'] ?></p>
	
		<h4>BANQUE : <?= strtoupper($ordreVirementBanque[0]['banque_name'])?></h4>

		<table class="main-table">
			<thead>
				<tr>
					<th>Compte</th>
					<th>Nom et prénom</th>
					<th style="text-align: center;">Motant</th>
				</tr>
				
			</thead>
			<tbody>

				<?php  foreach ($ordreVirementBanque as $key => $value) : ?>
				<tr>
					<td><?= $value['compte']; ?></td>
					<td><?= strtoupper($value['nom']).'  '.ucwords($value['prenom']); ?></td>
					<td style="text-align: center;"><?= afficheNombre($value['montant']); ?></td>
				</tr>

			<?php endforeach; ?>
			<tr>
				<?php $totalValue = count_sum_colonne_table($ordreVirementBanque,'montant'); 

				$totalOrdreVirement += $totalValue;

				?>
				<td colspan="2" style="text-align: center;"><b>Total General </b></td>
				<td style="text-align: center;"><b><?= afficheNombre($totalValue); ?> </b></td>
			</tr>
			</tbody>
		</table>

		<table style="width: 100%; padding-top: 50px;">

			<tr>
				<td style="width: 70%;">

					<b>LE DIRECTEUR ADMINISTRATIF ET FINANCIER</b> <br><br>
					<b>MANIRAKIZA Francine </b>
					
				</td>
				<td style="width: 30%;">
					<b>LE DIRECTEUR GENERAL </b><br><br>
					<b>Ir Apollinaire SINDIHEBURA </b>
				</td>
				
			</tr>

	
			
		</table>

	</page>	
			

<?php endforeach;?>






<?php 
$content = ob_get_clean();

//die($content);

//require_once dirname()'html2Pdf/vendor/autoload.php';

//require_once dirname(__FILE__).'/html2Pdf/vendor/autoload.php';
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


$pdf = new Html2Pdf('P','A4','fr','UTF-8'); 
$pdf->writeHTML($content); 
$pdf->Output(); 

?>