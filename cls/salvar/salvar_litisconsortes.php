<div class="content">
<?php

include_once('../../db/conn.php');

$nome = $_GET['nome'];
$oab = $_GET['oab'];
$tipo = $_GET['tipo'];
$endereco = $_GET['endereco'];
$numero = $_GET['numero'];
$bairro = $_GET['bairro'];
$cidade = $_GET['cidade'];
$estado = $_GET['estado'];
$cep = $_GET['cep'];
$telefone = $_GET['telefone'];
$celular = $_GET['celular'];
$cpf = $_GET['cpf'];
$email = $_GET['email'];
$banco = $_GET['banco'];
$agencia = $_GET['agencia'];
$conta = $_GET['conta'];
$op = $_GET['op'];
$tipo_conta = $_GET['tipo_conta'];
$receber_info = $_GET['receber_info'];
$receber_arq = $_GET['receber_arq'];

$sql = "INSERT INTO litisconsortes ( id,nome,endereco,numero,bairro,cidade,estado,cep,telefone,celular,cnpj,email,obs,receber_info) VALUES (NULL,'{$nome}','{$endereco}','{$numero}','{$bairro}','{$cidade}','{$estado}','{$cep}','{$telefone}','{$celular}','{$cnpj}','{$email}','{$obs}','{$receber_info}')";
mysqli_query($DB_CONECT,$sql) or die("erro no loop ".mysqli_error($DB_CONECT));
echo "cadastrado";
?>
</div>