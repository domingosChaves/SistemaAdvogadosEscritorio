<?php
session_start();
include_once('../db/conn2.php');
$matricula = strtoupper($_GET['matricula']);
$senha = strtoupper(crypt(strtoupper($_GET['senha']),strtoupper($_GET['matricula'])));
$query = mysqli_query($DB_CONECT, "SELECT * FROM usuarios WHERE matricula = '$matricula' AND senha = '$senha'");
$resul = mysqli_fetch_array($query);
if ($matricula == $resul['matricula'] and $senha == $resul['senha']) {
	$_SESSION['userID'] = $resul['id'];
	$_SESSION['matricula'] = $resul['matricula'];
	$_SESSION['ccusto'] = $resul['ccusto'];
	$_SESSION['nivel'] = $resul['nivel'];
	echo "OK";
	exit();
} else {
	echo "ERROR";
	}
?>