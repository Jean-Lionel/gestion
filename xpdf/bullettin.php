<?php
require_once('./config/getDate.php');
require_once('./config/calcule.php');

$matricule = $_GET['matricule'];

$employe =  find_employe_by_matricule($employes, $matricule);

if($employe == null){
	header('Location: ../app/menus');
	exit();
}
$autres_retenus = get_autre_retenue_employes($matricule,$periodeGet);

ob_start();

?>


<style>
	.main_table{
		width: 100%;
		margin-bottom: 40px;
	}
	.main_table ,.main_table th,.main_table td, .main_table tr{
		border-collapse: collapse;
		border: 1px solid;
	}

	.main_table td{
		width: 50%;
	}

	.main_table{
		padding-top: 10px;
	}

	.main_table td:nth-child(2){
		text-align: center;
		background: red;
	}

}

</style>

<page backleft="10mm" backright="10mm">

	<?php require("include/footer.php"); ?>

	<?php require("include/header_portrait.php");?>

	<p style="text-align: center;"><u>Bulletin de paie: Mois de <?= $employe['periode']['mois'] . ' / '. $employe['periode']['annee']?></u></p>

	<div>
		Matricule : <?= $employe['matricule']?> <br>
		Nom et prénom : <?= strtoupper($employe['nom']).' '. ucfirst($employe['prenom'])?>
	</div>

	<table class="main_table">
		<thead>
			<tr>
				<th>
					RETRUBUTION
				</th>
				<th>
					MONTANT
				</th>
				
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>
					SALAIRE DE BASE
				</td>

				<td>
					<?= $employe['salaireBase']?>
				</td>

			</tr>
			<tr>
				<td>
					LOGEMENT
				</td>
				<td>
					<?= $employe['logement']?>
				</td>

			</tr>

			<tr>
				<td>ALLOC.FAM/ENF</td>
				<td>
					<?= $employe['nombreEnfant'] * 1000; ?>
				</td>

			</tr>

			<tr>
				<td>AL FAM /CON</td>
				<td>
					<?= $employe['conjointFonction'] ? '0' : '2000'; ?>
				</td>
			</tr>

			<tr>
				<td>Régul Non Imposable</td>
				<td>0</td>
			</tr>

			<tr>
				<td>Indemn Déplacement</td>

				<td>
					<?= afficheNombre($employe['ind_deplacement']) ?>
				</td>
			</tr>

			<tr>
				<td>BRUT</td>
				<td>
					<?= afficheNombre($employe['brut1'])  ?>
				</td>
			</tr>

			<tr>
				<td>NET A PAYER</td>
				<td><?= afficheNombre($employe['net_a_payer']) ?></td>
			</tr>

		</tbody>
	</table>
<table class="main_table">
	<thead>
		<tr>
			<th>RETENUES</th>
			<th>MONTANT</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>INSS PART EMPL</td>
			<td>
				<?= afficheNombre($employe['pension_employe']); ?>

			</td>

		</tr>
		<tr>

			<td>MFP PAR EMPL</td>
			<td><?=  afficheNombre($employe['mutuel_employe']) ?></td>

		</tr>
		<tr>
			<td>IPR</td>
			<td><?= afficheNombre($employe['ipr']) ?></td>
		</tr>

		<?php foreach ($autres_retenus as $key => $value): ?>

			<tr>
				<td><?= ($value['variable_name']) ?></td>
				<td><?= afficheNombre($value['montant']) ?></td>

			</tr>

		<?php endforeach;?>

		<tr>
			<td>
				TOTAL DES RETENUES
			</td>

			<td>
				<?= afficheNombre(count_sum_colonne_table($autres_retenus,'montant') +$employe['ipr'] + $employe['mutuel_employe'] + $employe['pension_employe']) ?>
			</td>
		</tr>
	</tbody>
</table>
<table class="main_table">

	<thead>
		<tr>
			<th>ELEMENT D'INFORMATION</th>
			<th>MONTANT</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>DEB.SUR DEPL </td>
			<td></td>
		</tr>

		<tr>
			<td>Contre Valeur Logement</td>
			<td></td>
		</tr>
		<tr>
			<td>NET PARTIEL</td>
			<td><?= afficheNombre($employe['total_depenses']) ?></td>
		</tr>
		<tr>
			<td>Sal.de Base Brut</td>
			<td><?= afficheNombre($employe['salaireBase']) ?></td>
		</tr>
		<tr>
			<td>INSS PART PATR </td>
			<td><?= afficheNombre($employe['pension_employeur']) ?></td>
		</tr>
		<tr>
			<td>MFP PART PATR </td>
			<td><?= afficheNombre($employe['mituel_employeur_Patronal']) ?></td>
		</tr>
		<tr>
			<td>BASE INSS</td>
			<td>
				<?= afficheNombre($employe['base_pension_employe']) ?>
			</td>
		</tr>
		<tr>
			<td>BASE MFP</td>
			<td>
				<?= afficheNombre($employe['base_mituel']) ?>
			</td>
		</tr>

		<tr>
			<td>BASE IPR</td>
			<td>
				<?= afficheNombre($employe['base_ipr'])?>
			</td>
		</tr>

		<tr>
			<td>CONTRIBUTION AUX ELECTION</td>
			<td>0</td>
		</tr>
	</tbody>
</table>


<table class="footer-info" style="width: 100%; text-align: center;">

    <tr>
      <td style="width: 100%">

        <p>LE DIRECTEUR ADMINISTRATIF ET FINANCIER</p>
        <p>MANIRAKIZA Francine</p>
        
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

?>