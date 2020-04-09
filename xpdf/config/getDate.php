<?php

$periodeGet =['annee'=>date('Y'),'mois'=>date('m')];


if(isset($_GET['y'])){
	if(intval($_GET['y']) && intval($_GET['m'])){

	$periodeGet = ['annee'=> $_GET['y'],'mois'=>$_GET['m']];
}

}


