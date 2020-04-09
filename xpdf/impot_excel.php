<?php
header('Content-Type: application/json; charset=UTF-8');

require_once('./config/getDate.php');

require_once('./config/calcule.php');

$employes = ipr_get_file($employes);

$result = json_encode($employes);

echo "renderJson(".$result.")";

?>

