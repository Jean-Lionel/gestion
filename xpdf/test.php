<?php


function add_date_Month($orgDate,$mth){
  $cd = strtotime($orgDate);
  $retDAY = date('Y-m-d', mktime(0,0,0,date('m',$cd)+$mth,date('d',$cd),date('Y',$cd)));
  return $retDAY;
} 


var_dump(date('Y-m-d H:i:s',time()));

function add_date($givendate,$mth=0,$day=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y-m-d', 
      	mktime(date('h',$cd),
    	date('i',$cd),
    	 date('s',$cd), 
    	 date('m',$cd)+$mth,
    date('d',$cd)+$day, date('Y',$cd)+$yr));
      return $newdate;
 }


//var_dump(add_date('2020-03-4', 4));

die();

ob_start()
?>




<page>
	<style>
		table{
			width: 100%;
		}

		table tr td{
			text-align: center;
		}

/*

		h3{
			line-height: 4rem;
		}*/

		table tr td img{
			width: 90px;

		}

		td span{
			font-size: 15px;
			font-style: italic;
			font-family: 'arial';
		}

		 h3{
			margin: 2px;
			font-size: 15px;
		}
	</style>

<table style="width: 100%">
	<tr>
		<td style="width: 15%; text-align: right;">
			<img src="./images/logopays.png">

		</td>
		<td style="width: 70%;">
			
			<h3>REPUBLIQUE DU BURUNDI</h3>
			<h3>MINISTERE DE L'HYDRAULIQUE DE L'ENERGIE ET DES MINES</h3>
			
			
			<span>Agence Burundaise de L'Hydraulique et de L'Assainissement <br>
				en Milieu Rural</span>

				<hr>
		</td>

		<td style="width: 15%; text-align: left;">
			<img src="./images/logoahamr.png">
		</td>
	</tr>
</table>

<table>
	<thead>
		<tr>
			<th>bonjour 1</th>
			<th>bonjour 2</th>
			<th>bonjour 3</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>Case no 1</td>
			<td>Case no 2</td>
			<td>Case no 3</td>
		</tr>
	</tbody>
</table>

</page>

<?php

$content = ob_get_clean();


require_once dirname(__FILE__).'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


$pdf = new Html2Pdf('P','A4','fr','UTF-8'); 
$pdf->writeHTML($content); 
$pdf->Output(); 



// <page_header>
// 	ORDRE DE VIREMENT DES SALAIRES:02/2020
// 	</page_header>
// 	<page_footer>
// 	<style>
// 		table{
// 			width: 100%;
// 			background: #abc;
// 		}

// 		table td{
// 			text-align: center;
// 		}
		
// 		.right{
// 			margin-right: 2px;
// 			position: absolute;
// 			right: 20px;
// 		}
// 	</style>
// 			<table>
// 				<tr>
// 					<td>

// 						<span style="width: 70%;">
// 							LE DIRECTEUR ADMINISTRATIF ET FINANCIER
// 						</span> <br>
// 						<span>
// 							MANIRAKIZA Francine
// 						</span>
// 					</td>
// 					<td style="width: 30%;" class="right">
// 						<span>
// 							LE DIRECTEUR GENERAL
// 						</span>
// 						<br>
// 						<span>
// 							Ir Apollinaire SINDIHEBURA
// 						</span>
// 					</td>
// 				</tr>
// 			</table>

// 	</page_footer>