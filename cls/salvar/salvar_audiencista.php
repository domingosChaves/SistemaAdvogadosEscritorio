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
$obs = $_GET['obs'];
$receber_info = $_GET['receber_info'];
$receber_arq = $_GET['receber_arq'];

$sql = "INSERT INTO audiencista ( id,nome,oab,tipo,endereco,numero,bairro,cidade,estado,cep,telefone,celular,cpf,email,banco,agencia,conta,op,obs,tipo_conta,receber_info,receber_arq) VALUES ( NULL ,'{$nome}','{$oab}','{$tipo}','{$endereco}','{$numero}','{$bairro}','{$cidade}','{$estado}','{$cep}','{$telefone}','{$celular}','{$cpf}','{$email}','{$banco}','{$agencia}','{$conta}','{$op}','{$tipo_conta}','{$obs}','{$receber_info}','{$receber_arq}')";
mysqli_query($DB_CONECT,$sql) or die("erro no loop ".mysqli_error($DB_CONECT));
echo "cadastrado";
?>
</div>


