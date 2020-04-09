<?php 
require_once('./config/getDate.php');
require_once('./config/calcule.php');

$employes = get_FilesPaie($employes);

ob_start();
?>

<page backtop="0mm" backleft="1mm" backbottom="20mm" backright ="1mm" footer="page">
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
        font-size : 8px;
    }

    .main-table tr td {
        text-align: left;
        font-size: 8px;
    }

    .total td{

        font-size: 8px;
        color: #00000;
        font-weight: bold;
    }

</style>


<?php require("include/footer.php"); ?>

<?php require("include/header.php");?>

<!-- <table class="header-table">
    <tr>
        <td>
            <h2>LOGO</h2>
        </td>
        <td>
            <h3>REPUBLIQUE DU BURUNDI </h3>
            <h3>MINISTERE DE L'HYDRAULIQUE DE L'ENERGIE ET DES MINES</h3>
            <p class="sous-title">
             Agence Burundaise de L'Hydraulique et de  L'Assainissement 
             en Milieu Rural
         </p>
         <hr>
         <p class="title-fiche"> FICHE DE PAIE DU  MOIS DE : 02/2020 </p>
     </td>
     <td>
        <h2>LOGO</h2>
        <h3><?php echo utf8_decode('je suis étre'); 

        ?></h3>
    </td>
</tr>
</table> -->
    <p style="text-align: center;"><u> FICHE DE PAIE : MOIS DE 
        <?= $employes [0]['periode']['mois'] . ' / '. $employes[0]['periode']['annee']?>
    </u></p>

<table class="main-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Mat</th>
        <th>Nom et Prenom</th>
        <th>Sal .B</th>
        <th>Log</th>
        <th>Deplac</th>
        <th>All. Fam</th>
        <th>Brut 1</th>
        <th>Ind. ajust</th>
        <th>Aut.G</th>
        <th>Brut 2</th>
        <th>INSS</th>
        <th>Mut</th>
        <th>Base IPR</th>
        <th> IPR </th>
        <th> Aut.R</th>
        <th>Tot R</th>
        <th>N A P</th>
        <th>INSS Pat</th>
        <th>MFP Pat</th>
        <th>TOT.Dep</th>
    </tr>

</thead>


<tbody>



    <?php foreach ($employes as $key => $employe): ?>
        <tr>
            <td><?= ++$key; ?></td>
            <td><?= round($employe['matricule'] ) ?></td>
            <td><?= strtoupper($employe['nom']).' ' .$employe['prenom'] ?></td>
            <td> <?= afficheNombre($employe['salaireBase']) ?></td>
            <td> <?= afficheNombre($employe['logement']) ?></td>
            <td> <?= afficheNombre($employe['ind_deplacement']) ?></td>
            <td> <?= afficheNombre($employe['all_familial']) ?></td>
            <td> <?= afficheNombre($employe['salaire_brut_sans_ajustement']) ?></td>
            <td> <?= afficheNombre($employe['ind_ajustement']) ?></td>
            <td> <?= afficheNombre($employe['prime_Fonction']) ?></td>
            <td> <?= afficheNombre($employe['brut1']) ?></td>
            <td> <?= afficheNombre($employe['pension_employe']) ?></td>
            <td> <?= afficheNombre($employe['mutuel_employe']) ?></td>
            <td> <?= afficheNombre($employe['base_ipr']) ?></td>
            <td> <?= afficheNombre($employe['ipr']) ?></td>
            <td> <?= afficheNombre($employe['total_autre_retenu']) ?></td>
            <td> <?= afficheNombre($employe['total_retenu']) ?></td>
            <td> <?php if($employe['net_a_payer'] < 0): ?>
            <span style="background: red;"><?= afficheNombre($employe['net_a_payer']) ?></span>
            <?php else :?>
              <span><?= afficheNombre($employe['net_a_payer']) ?></span>  
          <?php endif; ?>
      </td>
      <td> <?= afficheNombre($employe['pension_employeur']) ?></td>
      <td> <?= afficheNombre($employe['mituel_employeur_Patronal']) ?></td>
      <td> <?= afficheNombre($employe['total_depenses']) ?></td>


  </tr>
<?php endforeach;?>



<tr class="total">
    <td colspan="3"><b>TOTAL</b></td>
    <td><?= afficheNombre($total_salaire_base,0,"."," ") ?></td>
    <td><?= afficheNombre($total_logement) ?></td>
    <td><?= afficheNombre($total_ind_deplacement) ?></td>
    <td><?= afficheNombre($total_all_familial) ?></td>
    <td><?= afficheNombre(count_sum_colonne_table($employes, 'salaire_brut_sans_ajustement')) ?></td>
    <td><?= afficheNombre($total_ind_ajustement) ?></td>
    <td><?= afficheNombre($total_prime_Fonction) ?></td>
    <td><?= afficheNombre($total_brut1) ?></td>
    <td><?= afficheNombre($total_pension_employe) ?></td>
    <td><?= afficheNombre($total_mutuel_employe) ?></td>
    <td><?= afficheNombre($total_base_ipr) ?></td>
    <td><?= afficheNombre($total_ipr) ?></td>
    <td><?= afficheNombre($total_total_autre_retenu) ?></td>
    <td><?= afficheNombre($total_total_retenu) ?></td>
    <td><?= afficheNombre($total_net_a_payer)?></td>
    <td><?= afficheNombre($total_pension_employeur)?></td>
    <td><?= afficheNombre($total_mituel_employeur_Patronal) ?></td>
    <td><?= afficheNombre($total_total_depenses) ?></td>
</tr>

</tbody>
</table>


<table style="width: 100%; padding-top: 50px;">

            <tr>
                <td style="width: 30%">

                    <b>POUR ETABLISSEMENT</b> <br><br>
                    <b>NDORICIMPA Antoinette</b>
                </td>
                <td style="width: 40%;">

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

<?php 
$content = ob_get_clean();


//require_once dirname()'html2Pdf/vendor/autoload.php';

//require_once dirname(__FILE__).'/html2Pdf/vendor/autoload.php';
require __DIR__.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$pdf = new Html2Pdf('L','A4','fr','UTF-8'); 

$pdf->writeHTML($content); 
$pdf->Output(); 

?>