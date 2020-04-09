<?php 
require_once('./config/getDate.php');
require_once('./config/calcule.php');


$employes = mituel_get_file($employes);

ob_start();
?>

<page backtop="0mm" backleft="30mm" backbottom="20mm" backright ="1mm" footer="page">
    <style>
        table{
            width: 100%;
            text-align : center;

        }

        th, td {
         padding: 5px;
         text-align: center;    
     }

     .header-table{
        margin-left: 125px;
    }

    .sous-title{
        font-size : 5mm;
        font-style: italic;
    }

    .title-fiche{
        text-decoration: underline;
        font-size: 14px;
    }

    .main-table th, .main-table td, .main-table{
        border: 0.5px solid black;
        border-collapse: collapse;
        font-size : 12px;
    }

    .main-table tr td {
        text-align: left;
        font-size: 9px;
    }

    .total td{

        font-size: 9px;
        color: #00000;
        font-weight: bold;
    }

</style>


<?php require("include/footer.php"); ?>

<?php require("include/header_portrait.php");?>

<h4 style="text-align: center;"><u>DECLARATION  MUTUELLE : MOIS DE <?= $employes[0]['periode']['mois'] . '/'. $employes[0]['periode']['annee']?> </u></h4>
<table class="main-table" center>
    <thead>
      <tr>
     
      <th>
      	No
      </th>
      <th>
      	Matricule
      </th>
      <th>
      	Nom et prénom
      </th>
      <th>
      	Base
      </th>
      <th>
      	Part Employé
      </th>
      <th>
      	Part Employeur
      </th>
      <th>
      	Montant
      </th>
    </tr>

</thead>


<tbody>



 <?php $no =0; foreach ($employes as $key => $employe): ?>

 <tr>
 	<td><?= ++$no; ?></td>

 	<td><?= $employe['matricule']; ?></td>
 	<td><?= $employe['nom'].' '.$employe['prenom']; ?></td>
 	<td><?= afficheNombre($employe['base']); ?></td>
 	<td><?= afficheNombre($employe['mutuel_employe']); ?></td>
 	<td><?= afficheNombre($employe['mituel_employeur_Patronal']); ?></td>
 	<td><?= afficheNombre($employe['montant']); ?></td>
 </tr>
      


<?php endforeach;?>

<tr>
	<td colspan="3">Total</td>
	<td><?= afficheNombre( count_sum_colonne_table($employes,'base'))?></td>
	<td><?=afficheNombre(count_sum_colonne_table($employes,'mutuel_employe'))?></td>
	<td><?= afficheNombre(count_sum_colonne_table($employes,'mituel_employeur_Patronal'))?></td>
	<td><?=afficheNombre(count_sum_colonne_table($employes,'montant'))?></td>
</tr>


</tbody>
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

//require_once dirname()'html2Pdf/vendor/autoload.php';

//require_once dirname(__FILE__).'/html2Pdf/vendor/autoload.php';
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


$pdf = new Html2Pdf('p','A4','fr','UTF-8'); 
$pdf->writeHTML($content); 
$pdf->Output(); 

?>