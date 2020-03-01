<?php

function connexion(){
	$conn = null;
	try{
		$conn = new PDO('mysql:host=localhost;dbname=ahmar','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

		 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 
	}catch(PDOException $e){
		die($e->getMessage());
	}
	return $conn;
	
}


