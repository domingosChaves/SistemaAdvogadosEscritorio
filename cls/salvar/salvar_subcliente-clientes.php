<div class="content">
<?php

include_once('../../db/conn2.php');

$id 	=	$_GET['id'];
$nome 	=	$_GET['nome'];
$sql = "UPDATE sisjur.subcliente SET subcliente.idcliente = $id WHERE subcliente.nome = '$nome'";
mysqli_query($DB_CONECT,$sql) or die(mysqli_error($DB_CONECT));
?>
</div>
