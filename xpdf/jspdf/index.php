<?php

require_once('../config/calcule.php');

$employes = get_FilesPaie($employes);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>JSPDF</title>
	<!-- <script src="../js/jquery-3.4.1.min.js"> </script> -->
	<script src="../js/jspdf.min.js"></script>
	<script src="../js/jspdf.plugin.autotable.js"></script>
</head>
<body>

	<button onclick="generatePdf()">
		Generer un pdf
	</button>
	<table class="main-table" id="content">
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

<script>
	function generatePdf(){
		let doc = new jsPDF('l');
		//let element = document.getElementById('content');
		//let result = doc.autoTableHtmlToJson(element);

		doc.setFontSize(8)
        
		doc.autoTable({
           html : '#content' 
        });
		doc.save('test.pdf')


	}
	
</script>
</body>
</html>