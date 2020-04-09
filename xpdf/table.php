<?php


ob_start()
?>
<style>
	table{
		width: 100%;
		background: #abc;
	}

	td{
		width: 25%;
	}
</style>

<page backtop="20mm" backleft="10mm" backright="10mm">

	<table >
		<tr>
			<td>je suis cool 1</td>
			<td>je suis cool 2</td>
			<td>je suis cool 3</td>
			<td>je suis cool 2</td>
		</tr>
	</table>


</page>

<?php

$content = ob_get_clean();


require_once dirname(__FILE__).'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


$pdf = new Html2Pdf('L','A4','fr','UTF-8'); 
$pdf->writeHTML($content); 
$pdf->Output(); 


