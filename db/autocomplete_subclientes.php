<?php

include_once('conn2.php');

if (isset($_GET['query'])) {

$dados = $_GET['query'];

$sql = mysqli_query ($DB_CONECT, "SELECT subcliente.nome FROM sisjur.subcliente WHERE subcliente.nome LIKE '%{$dados}%'");



  $array = array();
  
  while ($row = mysqli_fetch_assoc($sql)) {
 $array[] = $row['nome'];

  }
  
if (count($array) == 0 ) {
	$array[] = 'Nao há resultados';
echo json_encode ($array); //Return the JSON Array
} else {
echo json_encode ($array); //Return the JSON Array
}


  

}

?>
