<div class="content">
<?php

include_once('../../db/conn.php');

$nome = $_GET['nome'];
$endereco = $_GET['endereco'];
$numero = $_GET['numero'];
$bairro = $_GET['bairro'];
$cidade = $_GET['cidade'];
$estado = $_GET['estado'];
$cep = $_GET['cep'];
$telefone = $_GET['telefone'];
$celular = $_GET['celular'];
$cpf = $_GET['cpf'];
$cnpj = $_GET['cnpj'];
$email = $_GET['email'];
$obs = $_GET['obs'];

$sql = "INSERT INTO contrarios ( id,nome,endereco,numero,bairro,cidade,estado,cep,telefone,celular,cpf,cnpj,email,obs) VALUES ( NULL ,'{$nome}','{$endereco}','{$numero}','{$bairro}','{$cidade}','{$estado}','{$cep}','{$telefone}','{$celular}','{$cpf}','{$cnpj}','{$email}','{$obs}')";
mysqli_query($DB_CONECT,$sql) or die("erro no loop ".mysqli_error($DB_CONECT));
echo "cadastrado";
?>
</div>