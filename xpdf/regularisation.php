<?php
require_once('./config/getDate.php');
require_once('./config/calcule.php');

$resultat = regularisation_get_file($employes);


$totalGeneral = 0;


// foreach ($resultat as $key => $value) 
// 	$totalGeneral += $value['montant'];



// function ordonnerParCategories($resultat){
// 	$dataOrdonner = [];

// 	foreach ($resultat as $key => $value) {
		
// 		$keyName = $value['category_name'];
// 		$tab=[];

// 		foreach ($resultat as $key => $var) {
// 			if($var['category_name'] == $keyName){
// 				$tab[] = $var;
// 				unset($resultat[$key]);

// 			}
// 		}

// 		if(!empty($tab))
// 			$dataOrdonner[] = $tab;
// 	}

// 	return $dataOrdonner;
// }


$employesTables = order_table_by_key($resultat,'category_name');

ob_start();
?>

<page backbottom="20mm" backleft="20mm">
	<?php require("include/footer.php"); ?>

	<?php require("include/header_portrait.php");?>

	<p style="text-align: center;"><u> REGULARISATION NON IMPOSABLE  <?= $employesTables[0][0]['periode']['mois']. " / ". $employesTables[0][0]['periode']['annee'] ?> </u></p>

<?php foreach ($employesTables as $key => $value_reg):  ?>
						
		<style>
			p b{
				border: 1px solid black;
			}
			table{
				font-size: 10px;

				width: 100%;
			}
			.main-table, .main-table td,.main-table th,.main-table tr{
				border-collapse: collapse;
				border: 1px solid;
			}

			td{
				text-align: center;
			}

			h5{
				font-size: 10px;
			}

			/*.main-table td{
				width: 15%;
			}*/
			
		</style>
		<h5>CATEGORIE DE <?= $value_reg[0]['category_name']?></h5>

		<table class="main-table">
			<thead>
				<tr>
					<th>No</th>
					<th>Matricule</th>
					<th>Nom et prénom</th>
					<th>Date d'embauche</th>
					<th>Ancienneté</th>
					<th>Brut</th>
					<th>Ajustement</th>
				</tr>
				
			</thead>
			<tbody>

				<?php $count = 0;  foreach ($value_reg as $key => $value) : ?>
				<tr>
					<td style="width: 5%;"><?= ++$count; ?></td>
					<td style="width: 10%;"><?= $value['matricule']; ?></td>
					<td style="width: 35%; text-align: left;"><?= strtoupper($value['nom']).'  '.$value['prenom']; ?></td>
					<td style="width: 10%;"><?= $value['date_embauche']; ?></td>
					<td style="width: 10%;"><?= $value['ancienete']; ?></td>
					<td style="width: 10%"><?= afficheNombre($value['salaire_brut_sans_ajustement']); ?></td>
					<td style="width: 10%"><?= afficheNombre($value['ind_ajustement']); ?></td>
					
				</tr>

			<?php endforeach; ?>
			<tr>
				<?php $totalValue = count_sum_colonne_table($value_reg,'ind_ajustement');
				 $totalGeneral += $totalValue; ?>
				<td colspan="6" style="text-align: center;"><b>Total </b></td>
				<td><b><?= afficheNombre($totalValue); ?></b></td> 
			</tr>
			</tbody>
		</table>
			

<?php endforeach;?>

<p>
	<b>TOTAL GENERAL : <?= afficheNombre($totalGeneral) ?> </b>
</p>


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
<?php include('include/footer.php'); ?>

</page>	






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