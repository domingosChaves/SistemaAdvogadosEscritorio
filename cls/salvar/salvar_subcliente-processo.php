<?php
include_once('../../db/conn2.php');
$processo 	=	$_GET['processo'];
$cliente = $_GET['cliente'];
$subcliente = $_GET['subcliente'];

$sql = "INSERT INTO sisjur.proc_subcli (processo, cliente , subcliente) VALUES ('{$processo}','{$cliente}','{$subcliente}')";
mysqli_query($DB_CONECT,$sql) or die("erro no loop ".mysqli_error($DB_CONECT));
?>
