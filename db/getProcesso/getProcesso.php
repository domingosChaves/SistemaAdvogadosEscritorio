<?php

include_once('../conn2.php');
//VARIAVEIS
$campo = $_POST['campo'];
$dados = $_POST['dados'];
$array = array();
$client = array();
$advogado = array();
$contrario = array();
$tipo = array();
$arquivos = array();
//MAIN
$geral0 = mysqli_query ($DB_CONECT, "SELECT * FROM processos WHERE ".$campo.' = '.$dados);
$geral = mysqli_fetch_assoc($geral0);
$dados_Main = array('id'=> utf8_encode($geral['id']),'arquivamento'=> utf8_encode($geral["arquivamento"]),	'numero'=> utf8_encode($geral["numero"]),'obs'=> utf8_encode($geral['obs']));
$array[] = array('main' => $dados_Main);

//CLIENTE
$cli = mysqli_query ($DB_CONECT, "SELECT id,nome FROM clientes WHERE id = ".$geral['cliente']);
while ($cliente = mysqli_fetch_assoc($cli)) {	$client = array('id'=>utf8_encode($cliente['id']),'nome'=>utf8_encode($cliente['nome'])); };
$array[] = array('cliente' => $client);
//SUBCLIENTE
$subcli = mysqli_query ($DB_CONECT, "SELECT idsubcliente,nome FROM subcliente WHERE idcliente = ".$geral['cliente']);
while ($subcliente = mysqli_fetch_assoc($subcli)) {	
if ($subcliente['nome']=='') {} else {
	$sub =  array('id'=> utf8_encode($subcliente['idsubcliente']),'nome'=> utf8_encode($subcliente['nome']));
	$subclient[] = $sub;
};
}
$array[] = array('subcliente' => $subclient);

//ADVOGADO
$adv_in = mysqli_query ($DB_CONECT, "SELECT id,nome FROM advogados WHERE id in(SELECT DISTINCT advogado FROM proc_adv WHERE processo = $geral[id])");
while ($adv = mysqli_fetch_assoc($adv_in)) { 
	$advg = array('id'=>utf8_encode($adv['id']),'nome'=>utf8_encode($adv['nome']));
	$advogado[] =  $advg ; }
$array[] = array('advogado' => $advogado);

//CONTRARIO
$con_in = mysqli_query ($DB_CONECT, "SELECT id,nome FROM contrarios WHERE id in(SELECT DISTINCT contrario FROM proc_con WHERE processo = $geral[id])");
while ($contrarios = mysqli_fetch_assoc($con_in)) {
	$contr = array('id'=>utf8_encode($contrarios['id']),'nome'=>utf8_encode($contrarios['nome']));
	$contrario[] = $contr;}
$array[] = array('contrarios' => $contrario);

//TIPO AÇAO
$tipo_sql = mysqli_query($DB_CONECT,"SELECT id,descricao FROM tipoacao WHERE id in(SELECT DISTINCT tipoacao FROM processos WHERE id = $geral[id])");
while ($tipoResul = mysqli_fetch_assoc($tipo_sql)) {	$tipo[] = utf8_encode($tipoResul['descricao']);}
$array[] = array('tipoacao' => $tipo);

//ARQUIVOS
$arq_in = mysqli_query ($DB_CONECT, "SELECT id,nome FROM arquivos WHERE processo = $geral[id] ");
while ($arq = mysqli_fetch_assoc($arq_in)) {	
	$Arqu = array('id'=>utf8_encode($arq['id']),'nome'=>utf8_encode($arq['nome']));
	$arquivos[] = $Arqu;}
$array[] = array('arquivos' => $arquivos);

//PASSAGEM DE RESPOSTA PARA ESCUTA AJAX DO LADO CLIENTE
 header('Content-Type: application/json'); //Pagina abrir em formato Json
 echo json_encode ($array); //Return the JSON Array

?>