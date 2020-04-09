<?php
require_once('./config/getDate.php');

require_once('./config/calcule.php');
$result = get_file_autre_retenues($employes);


$autres_retenues = order_table_by_key($result,'variable_name');

//Les personnes qui ont les detes dans kcb

$kecb_employes = [];


foreach ($autres_retenues as $key => $value) {

	if(checkValue($value[0]['variable_name'])){
		$value['compte'] = getCompteNumber($value[0]['variable_name']);

		$kecb_employes[] = $value;
	}
}




$totalAutreRetenu = 0;


ob_start();
?>

<style>
	table{
		width: 100%;
		font-size: 10px;
	}

	h4{
		font-size: 10px;
	}
	td{
		width: 30%;
	}
	.main-table{
		margin-left: 15%;
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


<?php foreach ($autres_retenues as $key => $ordreVirementBanque):  ?>

	<?php if(!checkValue($ordreVirementBanque[0]['variable_name'])): ?>
	<page backtop="0mm" backleft="5mm" backbottom="10mm" backright="5mm" footer="page">
		
	<?php require("include/header_portrait.php");?>
	<p class="title">AUTRES RETENUS :<?php echo $ordreVirementBanque[0]['periode']['mois']." / ".$ordreVirementBanque[0]['periode']['annee']; ?></p>
				
	
		<h4>BANQUE : <?= strtoupper($ordreVirementBanque[0]['variable_name'])?></h4>

		<table class="main-table">
			<thead>
				<tr>
					
					<th style="text-align: center;">Matricule</th>
					<th>Nom et prénom</th>
					<th style="text-align: center;">Motant</th>
				</tr>
				
			</thead>
			<tbody>

				<?php foreach ($ordreVirementBanque as $key => $value) : ?>
				<tr>
					
					<td style="width: 15% ; text-align: center;"><?= $value['matricule']; ?></td>
					<td><?= strtoupper($value['nom']).'  '.ucwords($value['prenom']); ?></td>
					<td style="text-align: center; width: 15%;"><?= afficheNombre($value['montant']); ?></td>
				</tr>

			<?php endforeach; ?>
			<tr>
				<?php $totalValue = count_sum_colonne_table($ordreVirementBanque,'montant');
				$totalAutreRetenu += $totalValue;
				 ?>
				<td colspan="2" style="text-align: center;"><b>Total Général </b></td>
				<td style="text-align: center;"><b><?= afficheNombre($totalValue); ?> </b></td>
			</tr>
			</tbody>
		</table>


			
		<table style="width: 100%; padding-top: 50px; ">

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


<?php endif;?>

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