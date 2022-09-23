<?php
include_once('../conn2.php');
//VARIAVEIS
$campo = $_POST['campo'];
$dados = $_POST['dados'];

// $campo = 'nome';
// $dados = 'TELEMAR NORTE LESTE S/A';

$geral0 = mysqli_query($DB_CONECT, "SELECT * FROM processos WHERE cliente in(SELECT id FROM clientes WHERE $campo = '$dados');");
// $geral0 = mysqli_query($DB_CONECT, "SELECT * FROM processos WHERE cliente = 1");
while ($geral = mysqli_fetch_assoc($geral0)) {
	echo $geral['id']." <br>";
}

?>


