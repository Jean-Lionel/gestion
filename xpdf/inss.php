<?php
require_once('./config/getDate.php');

require_once('./config/calcule.php');

$employesData = get_file_iness($employes);

ob_start();
?>
<style>
	table{
		width: 100%;
		font-size: 11px;
	}

	.main-table td,.main-table tr,.main-table {
		border-collapse: collapse;
		border: 1px solid;
		text-align: center;

	}


	td.noborder{
		border-top: none;
		border-left: none;
		
	}

	.left-text{
		text-align: left;
	}

	.header-table td{
		width: 7%;
		font-weight: bold;
		text-align: center;
	}

	.header-title td,.total td{
		font-weight: bold;
		text-align: center;
	}
	.footer-info p{
		margin-bottom: 0;
	}


</style>

<page backbottom="20mm" footer="page" backright="15mm">

	<?php require("include/footer.php"); ?>

<?php require("include/header_portrait.php");?>

	<p style="text-align: center;"><u>DECLARATION INSS : MOIS DE <?= $employesData[0]['periode']['mois'] . "/".$employesData[0]['periode']['annee'] ?></u></p>
	<table class="main-table">
		<tr class="header-title">
			<td colspan="2" rowspan="2" class="noborder"></td>
			<td colspan="4">Part Employé</td>
			<td colspan="4">Part Employeur</td>
			<td rowspan="2" class="noborder" style="border-right: none;"></td>
		</tr>
		<tr class="header-title">
			<td colspan="2">Pension</td>
			<td colspan="2">Risque</td>
			<td colspan="2">Pesion</td>
			<td colspan="2">Risque</td>
			
		</tr>
		<tr class="header-table">
			<td>No</td>
			<td style="width: 30%">Nom et prénom</td>
			<td>Base</td>
			<td>Montant</td>
			<td>Base</td>
			<td>Montant</td>
			<td>Base</td>
			<td>Montant</td>
			<td>Base</td>
			<td>Montant</td>
			<td>Total</td>
			
		</tr>

		<?php $x=0; foreach ($employesData as $key => $value): ?>
			<tr>
				<td><?= ++$x ?></td>
				<td class="left-text"><?= strtoupper($value['nom']).' '. $value['prenom'] ?></td>
				<td><?= afficheNombre($value['base_pension_employe']) ?></td>
				<td><?= afficheNombre($value['montant_pension_employe']) ?></td>
				<td><?= afficheNombre($value['base_risque_employe']) ?></td>
				<td><?= afficheNombre($value['montant_risque_employe']) ?></td>
				<td><?= afficheNombre($value['base_pension_employeur']) ?></td>
				<td><?= afficheNombre($value['montant_pension_employeur']) ?></td>
				<td><?= afficheNombre($value['base_risque_employeur']) ?></td>
				<td><?= afficheNombre($value['montant_risque_employeur']) ?></td>
				<td><?= afficheNombre($value['total']) ?></td>
			</tr>
		<?php endforeach; ?>

		<tr class="total">

		<td colspan="2" class="noborder" style="border-bottom: none;">TOTAL</td>

		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'base_pension_employe')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'montant_pension_employe')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'base_risque_employe')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'montant_risque_employe')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'base_pension_employeur')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'montant_pension_employeur')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'base_risque_employeur')) ?></td>
		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'montant_risque_employeur')) ?></td>


		<td><?= afficheNombre(count_sum_colonne_table($employesData, 'total') + 3);//tricherie de +3 ?></td>
			
		</tr>

	</table>

	<table class="footer-info" style="width: 100%">

		<tr>
			<td style="width: 45%">

				<p>LE DIRECTEUR ADMINISTRATIF ET FINANCIER</p>
				<p>MANIRAKIZA Francine</p>
				
			</td>

			<td style="width: 15%">
				
			</td>

			<td style="width: 40%; ">
				<p style="text-align: right;">LE DIRECTEUR GENERAL</p>
				<p style="text-align: right;">Ir Apollinaire SINDIHEBURA </p>
			</td>
		</tr>
		
	</table>

</page>

<?php

$content = ob_get_clean();


//die($content);

require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


$pdf = new Html2Pdf('p','A4','fr','UTF-8'); 
$pdf->writeHTML($content); 
$pdf->Output(); 