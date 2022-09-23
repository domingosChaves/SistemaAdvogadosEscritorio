<div class="painel_link" style="padding: 2%;">
<meta charset="utf-8">
<script type="text/javascript">
$(document).ready(function(){
chamar_table();
})
	</script>
<?php
include_once('../conn2.php');

$tabela = $_GET['tabela'];
$campo = $_GET['campo'];
$dados = $_GET['dados']; 

if (!(isset($tabela) and isset($campo))) {
	echo "vazia";
} else {
switch ($tabela) {
	case 'processos':
if ($campo == "arquivamento") {
$sql = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.processos WHERE processos.arquivamento LIKE '%{$dados}%'");
		?>
<div class="row" style="font-size: 11px; text-align: center;">
	
<div class="col-md-3">N&ordm; do Processo</div><div class="col-md-3">N&ordm; do Recurso</div><div class="col-md-6">Cliente</div>

<?php
while ($row = mysqli_fetch_assoc($sql)) {
	$id = $row['id'];
	$proc = $row['arquivamento'];
	$num = $row['numero'];
	$cliente = $row['cliente'];
	$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $id";
	$test = mysqli_query ($DB_CONECT, "SELECT DISTINCT nome FROM clientes WHERE id in($sql_cli)");
	$cli = mysqli_fetch_assoc($test);

echo '<a style="cursor:pointer;" rel="'.$tabela.'" value="'.$id.'"><div class="col-md-2" style="overflow:hidden">'.$proc.'</div><div class="col-md-3" style="overflow:hidden">'.$num.'</div><div class="col-md-7" style="overflow:hidden">'.$cli['nome'].'<br>'.'</div></a><br>';
}

/*
 $sql = "SELECT * FROM 'proc_cli' WHERE 'processo' = $id ";
 $sql1="SELECT * FROM prefeitura WHERE id in($sql) ORDER BY prefeitura ASC ";
 */


$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $id";
$test = mysqli_query ($DB_CONECT, "SELECT nome FROM clientes WHERE id in($sql_cli)");
$cli = mysqli_fetch_assoc($test);

echo $cli['nome'];
?>

</div>

	<?php

	} else {

$sql = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.processos WHERE processos.numero LIKE '%{$dados}%'");
		?>
<div class="row" style="font-size: 11px; text-align: center;">
<b>	
<div class="col-md-3">N&ordm; do Recurso</div><div class="col-md-3">N&ordm; do Processo</div><div class="col-md-6">Cliente</div>
</b>
<?php
while ($row = mysqli_fetch_assoc($sql)) {
	$id = $row['id'];
	$proc = $row['arquivamento'];
	$num = $row['numero'];
	$cliente = $row['cliente'];
	$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $id";
	$test = mysqli_query ($DB_CONECT, "SELECT DISTINCT nome FROM clientes WHERE id in($sql_cli)");
	$cli = mysqli_fetch_assoc($test);

echo '<a style="cursor:pointer;" rel="'.$tabela.'" value="'.$id.'"><div class="col-md-2" style="overflow:hidden">'.$num.'</div><div class="col-md-3" style="overflow:hidden">'.$proc.'</div><div class="col-md-7" style="overflow:hidden">'.$cli['nome'].'<br>'.'</div></a><br>';
}

?>

</div>

	<?php


	}
	break;
	case 'clientes':
		
if ($campo = "nome") {
	
$sql = mysqli_query ($DB_CONECT, "SELECT DISTINCT * FROM sisjur.clientes WHERE clientes.nome LIKE '%{$dados}%'");
		?>
<div class="row" style="font-size: 10px; text-align: justify-all;">
<b>	
<div class="col-md-10">Nome</div>
</b>
<?php
while ($row = mysqli_fetch_assoc($sql)) {
	$id = $row['id'];
	$nome = $row['nome'];
	$end = $row['endereco'];
	$email = $row['email'];
	
	echo '<a style="cursor:pointer;" rel="'.$tabela.'" value="'.$id.'"><div class="col-md-10" style="overflow:hidden;">'.$nome.'</div></a><br>';
}

?>

</div>

	<?php


	} else {
	echo "apelido";
}
		break;
	case 'subcliente':

if ($campo = "subcliente") {
	
$sql = mysqli_query ($DB_CONECT, "SELECT DISTINCT subcliente.* FROM sisjur.subcliente WHERE subcliente.nome LIKE '%{$dados}%'");
		?>
<div class="row" style="font-size: 10px; text-align: justify-all;">
<b>	
<div class="col-md-10">Nome</div>
</b>
<?php
while ($row = mysqli_fetch_assoc($sql)) {
	$id = $row['idsubcliente'];
	$nome = $row['nome'];
		echo '<a style="cursor:pointer;" rel="'.$tabela.'" value="'.$id.'"><div class="col-md-10" style="overflow:hidden;">'.$nome.'</div></a><br>';
}

?>

</div>

	<?php


	} else {
	echo "apelido";
}

		break;
	case 'contrarios':



if ($campo = "contrarios") {
	
$sql = mysqli_query ($DB_CONECT, "SELECT DISTINCT contrarios.* FROM sisjur.contrarios WHERE contrarios.nome LIKE '%{$dados}%'");
		?>
<div class="row" style="font-size: 10px; text-align: justify-all;">
<b>	
<div class="col-md-10">Nome</div>
</b>
<?php
while ($row = mysqli_fetch_assoc($sql)) {
	$id = $row['id'];
	$nome = $row['nome'];
		echo '<a style="cursor:pointer;" rel="'.$tabela.'" value="'.$id.'"><div class="col-md-10" style="overflow:hidden;">'.$nome.'</div></a><br>';
}

?>

</div>

	<?php


	} else {
	echo "apelido";
}
		
		break;
	case 'advogados':
		
		break;
	case 'compromisso':
		
		break;
	default:
	echo "Selecione um filtro";
		break;
}











}




?>

	
</div>