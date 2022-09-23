<?php

include_once('conn2.php');

if (isset($_GET['query'])) {
$tabela = $_GET['tabela'];
$campo = $_GET['campo'];
$dados = $_GET['query'];
$sql = mysqli_query ($DB_CONECT, "SELECT $campo FROM $tabela WHERE $campo LIKE '%{$dados}%'");

$array = array();
  
  while ($row = mysqli_fetch_assoc($sql)) {
    $array[] = $row[$campo];
  }
  
 if (count($array) == 0 ) {
  $array[] = 'Nao há resultados';
echo json_encode ($array); //Return the JSON Array
} else {
echo json_encode ($array); //Return the JSON Array
}


}

?>
