<div class="content">
<?php

include_once('../../db/conn2.php');

$nome 	=	$_GET['nome'];
$email 	=	$_GET['email'];
$login 	=	$_GET['login'];
$senha 	=	$_GET['senha'];
$obs 	=	$_GET['obs'];
$info 	=	$_GET['info'];
$anexo 	=	$_GET['anexo'];
$compr 	=	$_GET['rcompromisso'];

$sql = "INSERT INTO clientes (
id,
nome,
endereco,
complemento,
cidade,
estado,
CEP,
telefone,
celular,
fax,
email,
CPF,
CNPJ,
InscEst,
obs,
info,
anexo,
rcompromisso,
login,
senha) VALUES (NULL,'{$nome}','0','0','0','0','0','0','0','0','{$email}','{0}','{0}','{0}','{$obs}','{$info}','{$anexo}','{$compr}','{$login}','{$senha}')";
$query = mysqli_query($DB_CONECT,$sql) or die(mysqli_error($DB_CONECT));
if ($query) {
	echo "tudo certo";
} else {
	echo "algo deu errado";
}

?>
</div>