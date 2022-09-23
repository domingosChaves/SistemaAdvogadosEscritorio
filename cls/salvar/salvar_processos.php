<?php
/**
* CLASSE PARA CADASTRAR NOVO PROCESSO
*/
class NewPro
{
	
public function Start()
{
	$this->Valiadar();
}
private function Valiadar()
{
if (empty($_POST['id_procorigem']))
{
	$this->Cadastrar();
}
else{
	$this->Update();
}

/*
if (empty($_POST['id_procorigem']) or 
	empty($_POST['arquivamento']) or 
	empty($_POST['numero']) or 
	empty($_POST['id_nome']))
{
	return 
	false;
}
else
{
echo "tudo certo";};
*/
}
private function Cadastrar()
{

include_once('../../db/conn2.php');

$arquivamento = $_POST['arquivamento'];
$numero = $_POST['numero'];
$cliente = $_POST['clientes'];
$tipoacao = $_POST['salvar_acoes'];
$obs = $_POST['obs'];
@session_start();
$user = $_SESSION['matricula'];
/*

$sql = "SHOW COLUMNS FROM processos ";
$query = mysqli_query($DB_CONECT,$sql);  //or die("erro no loop ".mysqli_error($conexao));
$array = array();
  
while ($row = mysqli_fetch_assoc($query)) {
$r = $row['Field'];
echo $r.',<br>';
}
*/
$sql = "INSERT INTO processos (
id,
procorigem,
arquivamento,
numero,
recurso,
assunto,
contrato,
vendedor,
gerente,
cliente,
idsubcliente,
advogado,
coreu1,
coreu2,
contrario,
exadversis,
produto,
tipoacao,
prognostico,
juiz,
ofjustica,
juizo,
fase,
data,
valor,
papel,
obs,
matricula,
ultatualizacao,
nomepreposto)
VALUES(
NULL,
NULL,
'{$arquivamento}',
'{$numero}',
null,
null,
null,
null,
null,
null,
null,
null,
null,
null,
null,
null,
null,
'{$tipoacao}',
0,
null,
null,
null,
null,
now(),
null,
null,
'{$obs}',
'{$user}',
now(),
null
)";
//mysqli_query($DB_CONECT, $sql) or die(mysqli_error($DB_CONECT));

$sql_busca = "SELECT processos.id FROM sisjur.processos WHERE processos.arquivamento = $arquivamento";
$query_busca = mysqli_query($DB_CONECT, $sql_busca);
$resul = mysqli_fetch_assoc($query_busca);

$sql_busca2 = "SELECT clientes.id FROM sisjur.clientes WHERE clientes.nome = '$cliente'";
$query_busca2 = mysqli_query($DB_CONECT, $sql_busca2) or die(mysqli_error($DB_CONECT));
$resul2 = mysqli_fetch_assoc($query_busca2);

$id_processo = $resul['id'];
$id_cliente = $resul2['id'];
mysqli_query($DB_CONECT, "INSERT INTO sisjur.proc_cli (processo,cliente) VALUES ('{$id_processo}','{$id_cliente}')");



}
private function Update()
{
	echo "update";
}

private function Verificar()
{
	# code...
}
private function Finalzar()
{
	# code...
}

}

$Pro = new NewPro();
$Pro->Start();


?>