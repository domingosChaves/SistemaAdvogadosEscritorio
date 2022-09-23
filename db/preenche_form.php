<div class="content">
<?php
include_once('conn2.php');
$tabela = $_GET['tabela'];
$campo = $_GET['campo'];
$query = $_GET['query'];
switch ($campo) {
case 'salvar_subcliente':		$sql = "SELECT * FROM $tabela WHERE nome = '$query' 	";	break;
case 'salvar_advogados'	:		$sql = "SELECT * FROM audiencista WHERE nome = '$query'	";	break;
case 'salvar_contrarios':		$sql = "SELECT * FROM contrarios WHERE nome = '$query'	";	break;
case 'nome'				:		$sql = "SELECT * FROM $tabela WHERE $campo = '$query' 	";	break;
default:						$sql = "SELECT * FROM $tabela WHERE $campo = '$query' 	";	break;

}

$resul = mysqli_query($DB_CONECT,$sql) or die("erro no loop ".mysqli_error($DB_CONECT));
$row = mysqli_fetch_array($resul);
switch ($campo) {
case 'id':?>
<script type='text/javascript'>
$('#id_procorigem').val('<?php echo $row["id"];?>');
$('#arquivamento').val('<?php echo $row["arquivamento"];?>');
$('#numero').val('<?php echo $row["numero"];?>');
<?php
$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $row[id]";
$sql_id_cli = mysqli_fetch_assoc(mysqli_query ($DB_CONECT, $sql_cli));
$cli_in = mysqli_query ($DB_CONECT, "SELECT * FROM clientes WHERE id in($sql_cli)");
$cli = mysqli_fetch_assoc($cli_in);
?>
$('#id_nome').val('<?php echo $sql_id_cli["cliente"];?>');
$('#clientes').val('<?php echo $cli["nome"];?>');
$('#obs').val('<?php echo $row["obs"];?>')
</script>
<?php
	break;
case 'arquivamento':?>
<script type='text/javascript'>
$('#id_procorigem').val('<?php echo $row["id"];?>');
$('#arquivamento').val('<?php echo $row["arquivamento"];?>');
$('#numero').val('<?php echo $row["numero"];?>');
<?php
$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $row[id]";
$sql_id_cli = mysqli_fetch_assoc(mysqli_query ($DB_CONECT, $sql_cli));
$cli_in = mysqli_query ($DB_CONECT, "SELECT * FROM clientes WHERE id in($sql_cli)");
$cli = mysqli_fetch_assoc($cli_in);
?>
$('#id_nome').val('<?php echo $sql_id_cli["cliente"];?>');
$('#clientes').val('<?php echo $cli["nome"];?>');
$('#obs').val('<?php echo $row["obs"];?>')
</script>
<?php
	break;
case 'numero':?>
<script type='text/javascript'>
$('#id_procorigem').val('<?php echo $row["id"];?>');
$('#arquivamento').val('<?php echo $row["arquivamento"];?>');
$('#id_nome').val('<?php echo $row["cliente"];?>');
<?php
$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $row[id]";
$sql_id_cli = mysqli_fetch_assoc(mysqli_query ($DB_CONECT, $sql_cli));
$cli_in = mysqli_query ($DB_CONECT, "SELECT * FROM clientes WHERE id in($sql_cli)");
$cli = mysqli_fetch_assoc($cli_in);
?>
$('#id_nome').val('<?php echo $sql_id_cli["cliente"];?>');
$('#clientes').val('<?php echo $cli["nome"];?>');
$('#obs').val('<?php echo $row["obs"];?>')
</script>
<?php
	break;
	case 'clientes':
$query = mysqli_query ($DB_CONECT, "SELECT * FROM clientes WHERE nome = '$query' ");
$resul = mysqli_fetch_assoc($query);?>
<script type='text/javascript'>
$('#id_nome').val('<?php echo $resul["id"]; ?>');
$('#email').val('<?php echo $resul["email"]; ?>');
$('#login').val('<?php echo $resul["login"]; ?>');
$('#senha').val('<?php echo $resul["senha"]; ?>');
$('#obs').val('<?php echo $resul["obs"]; ?>');
</script>";	
<?php
break;
case 'salvar_subcliente':
$query = mysqli_query ($DB_CONECT, $sql);
$resul = mysqli_fetch_assoc($query);
echo "<script type='text/javascript'>";
echo "$('#id_subcliente').val('".$resul["idsubcliente"]."');";
echo "</script>";	
	break;
case 'salvar_advogados':
$query = mysqli_query ($DB_CONECT, $sql);
$resul = mysqli_fetch_assoc($query);
echo "<script type='text/javascript'>";
echo "$('#id_advogado').val('$resul[id]');";
echo "</script>";	
break;
case 'salvar_contrarios':
$query = mysqli_query ($DB_CONECT, $sql);
$resul = mysqli_fetch_assoc($query);
echo "<script type='text/javascript'>";
echo "$('#id_contrarios').val('$resul[id]');";
echo "</script>";	
	break;
case 'nome':
echo "<script type='text/javascript'>";
echo "$('#id_$campo').val('$row[id]');";
echo "$('#email').val('$row[email]');";
echo "</script>";	
	break;
	default:
echo "<script type='text/javascript'>$('#id_$campo').val('$row[id]');</script>";
		break;
}

// $sql = "SHOW COLUMNS FROM contrarios ";
// $query = mysqli_query($DB_CONECT,$sql);  //or die("erro no loop ".mysqli_error($conexao));
// $array = array();
  
  // while ($row = mysqli_fetch_assoc($query)) {
    // $r = $row['Field'];
    // echo $r.'<br>';
  // }

?>

</div>

