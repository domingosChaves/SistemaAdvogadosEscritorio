<div class="content">
<?php

include_once('../../db/conn2.php');

$nome  = $_GET['nome'];
$endereco = $_GET['endereco'];
$numero  = $_GET['numero'];
$bairro  = $_GET['bairro']." ".$numero;
$cidade  = $_GET['cidade'];
$estado  = $_GET['estado'];
$cep = $_GET['cep'];
$telefone = $_GET['telefone'];
$celular = $_GET['celular'];
$cpf = $_GET['cpf'];
$cnpj  = $_GET['cnpj'];
$email = $_GET['email'];
$login = $_GET['login'];
$senha = $_GET['senha'];
$obs = $_GET['obs'];
$info  = $_GET['info'];
$anexo = $_GET['anexo'];
$compromisso = $_GET['rcompromisso'];

$sql = "INSERT INTO subcliente (
idsubcliente,
idcliente,
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
senha)
VALUES (
NULL,
NULL,
'{$nome }',
'{$endereco}',
'{$bairro}',
'{$cidade }',
'{$estado }',
'{$cep}',
'{$telefone}',
'{$celular}',
NULL,
'{$email}',
'{$cpf}',
'{$cnpj}',
NULL,
'{$obs}',
'{$info}',
'{$anexo}',
'{$compromisso}',
'{$login}',
'{$senha}')";
mysqli_query($DB_CONECT,$sql)or die(mysqli_error($DB_CONECT));  //or die("erro no loop ".mysqli_error($conexao));
echo "cadastrado";
?>
</div>