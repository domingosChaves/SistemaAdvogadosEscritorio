<div class="painel_link" style="padding: 2%;">
	<script type="text/javascript">
    $(document).ready(function(){
    chamar_table();
            })
		
	</script>
  <?php
include_once('../conn2.php');
$table = $_GET['tabela'];
$id = $_GET['id'];


switch ($table) {

//PROCESSO

case 'processos':

$sql = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.processos WHERE processos.id = $id ");
$row = mysqli_fetch_assoc($sql);
$id = $row['id'];
$arquivamento = $row['arquivamento'];
$numero = $row['numero'];
$cliente = $row['cliente'];
$obs = $row['obs'];
?>
<div class="row">
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">
<div id="abrir" value="Processos" rel="processos" rel2="id" rel3="<?php echo $id; ?>" style="cursor: pointer;">  Processo <?php echo $arquivamento;?></div></div>
<!--PROC. ORIGINAL-->
<div class="form-group col-md-4" id="procorigem_">
  <label for="procorigem">N° Proc. Original:</label><br>
  <?php echo $arquivamento;?>
  </div>

<!--NUMERO DO RECURSO-->
<div class="form-group col-md-4" id="numero_">
	<label for="procorigem">N° do Recurso:</label><br>
<?php echo $numero;?>
</div>


<!--CLIENTE-->
<div class="form-group col-md-7" id="clientes_">
  <label for="cliente">Cliente:</label><br>
<?php

$sql_cli = "SELECT DISTINCT cliente FROM proc_cli WHERE processo = $id";
$subcli_id = $cli = mysqli_fetch_assoc(mysqli_query ($DB_CONECT, $sql_cli));
$cli_in = mysqli_query ($DB_CONECT, "SELECT * FROM clientes WHERE id in($sql_cli)");
while ($cli = mysqli_fetch_assoc($cli_in)) {
echo $cli['nome'];
}
?>

</div>

<!-- SUB CLIENTE -->
<div class="form-group col-md-10" style="overflow: scroll;  overflow-x: hidden; max-height: 200px">
  <label for="subcliente" style="width: 100%">Sub Cliente:</label>

<?php
$sql_subcli = mysqli_query ($DB_CONECT, "SELECT nome FROM subcliente WHERE idcliente = '$subcli_id[cliente]'");
while ($subcli = mysqli_fetch_assoc($sql_subcli)) {
echo $subcli['nome']."<br>";
}
?>
</div>

<!--ADVOGADO-->
<div class="form-group col-md-7">
  <label for="advogado" style="width: 100%">Audiencista:</label>
<?php


$sql_adv = "SELECT DISTINCT advogado FROM proc_adv WHERE processo = $id";
$adv_in = mysqli_query ($DB_CONECT, "SELECT * FROM advogados WHERE id in($sql_adv)");
while ($adv = mysqli_fetch_assoc($adv_in)) {
echo $adv['nome'].'<br>';
}

?>  

</div>
<!--CONTRARIO-->
<div class="form-group col-md-7">
  <label for="contrario" style="width: 100%">Contrários:</label>
<?php
$sql_con = "SELECT DISTINCT contrario FROM proc_con WHERE processo = $id";
$con_in = mysqli_query ($DB_CONECT, "SELECT * FROM contrarios WHERE id in($sql_con)");
while ($adv = mysqli_fetch_assoc($con_in)) {
echo $adv['nome'].'<br>';
}
?>  
</div>
<!-- ACAO -->
<div class="form-group col-md-7">
  <label for="acao" style="width: 100%">Tipo Ações:</label>
<?php
$sql_tip = "SELECT DISTINCT tipoacao FROM processos WHERE id = $id";
$tip_in = mysqli_query ($DB_CONECT, "SELECT * FROM tipoacao WHERE id in($sql_tip)");
while ($tip = mysqli_fetch_assoc($tip_in)) {
echo $tip['descricao'].'<br>';
}
?>  
</div>
<!--ARQUIVO-->
<div class="form-group col-md-7">
  <label for="arquivo" style="width: 100%">Arquivos</label>
<?php
$arq_in = mysqli_query ($DB_CONECT, "SELECT * FROM arquivos WHERE processo = $id ");
while ($arq = mysqli_fetch_assoc($arq_in)) {
echo $arq['nome'].'<br>';}
?>  
</div>
<!--OBS -->
<div class="form-group col-md-7">
  <label for="textarea2" style="width: 100%">Obs:</label>
<?php echo $obs;?>
</div>
</div>
<?php

		break;
	case 'clientes':

	//CLIENTES
$sql = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.clientes WHERE clientes.id = $id ");
$row = mysqli_fetch_assoc($sql);
$id = $row['id'];
$nome = $row['nome'];
$end = $row['endereco'];
$email = $row['email'];

?>
<div class="rows">
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Clientes</div>
<!--NOME-->
<div class="form-group" id="nome_">
    <label for="nome">Nome:</label><br>
<?php  echo $nome; ?>
</div>

<!--ENDEREÇO-->
<div class="form-group" id="nome_">
<label for="nome">Endereço:</label><br>
<?php  echo $end."<br>"; ?>
<label for="nome">Bairro:</label><br>
<?php  echo $row['complemento']."<br>"; ?>
<label for="nome">Cidade - Estado:</label><br>
<?php  echo $row['cidade']."-".$row['estado']."<br>"; ?>

</div>

<!--EMAIL-->
<div class="form-group col-md-10">
  <label for="email">Email:</label><br>
<?php  echo $email; ?>
</div>

<!-- SUB CLIENTE -->
<div class="form-group col-md-10" style="overflow: scroll;  overflow-x: hidden; max-height: 200px">
  <label for="subcliente" style="width: 100%">Sub Cliente:</label><br>
  <?php
$sql_subcli = mysqli_query ($DB_CONECT, "SELECT nome FROM subcliente WHERE idcliente = $id ");
while ($subcli = mysqli_fetch_assoc($sql_subcli)) {
echo $subcli['nome']."<br>";
}
?>

</div>

<div class="form-group col-md-10">
  <label for="subcliente">Processos:</label><br>
  <?php



$sql_pro_cli = "SELECT DISTINCT processo FROM proc_cli WHERE cliente = $id";
$pro_cli_in = mysqli_query ($DB_CONECT, "SELECT * FROM processos WHERE id in($sql_pro_cli)");
while ($pro_cli = mysqli_fetch_assoc($pro_cli_in)) {
	
echo '<a style="cursor:pointer;" rel="processos" value="'.$pro_cli['id'].'"><div class="col-md-2" style="overflow:hidden">'.$pro_cli['id'].'</div><div class="col-md-3" style="overflow:hidden">'.$pro_cli['numero'].'</div><div class="col-md-7" style="overflow:hidden">'.$pro_cli['obs'].'<br>'.'</div></a><br>';

}

?>

</div>




</div>

<?php
		break;
	case 'subcliente':
$sql = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.subcliente WHERE subcliente.idsubcliente = $id ");
$row = mysqli_fetch_assoc($sql);
$id = $row['idsubcliente'];
$nome = $row['nome'];
$end = $row['endereco'];
$email = $row['email'];
?>		


<div class="rows">
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Sub-Cliente</div>

<!--NOME-->
<div class="form-group">
  <label for="nome">Nome:</label>
<?php echo $nome ;?>
</div>
<!--ENDEREÇO -->
<div class="form-group col-md-6">
  <label for="endereco">Endereço:</label>
<?php $end;?>
</div>

<!--BAIRRO-->
<div class="form-group col-md-5">
  <label for="cidade"> Bairro:</label>
<?php echo $row['complemento'];?>
</div>

<!--CIDADE-->
<div class="form-group col-md-3">
  <label for="cidade"> Cidade:</label>
<?php echo $row['cidade'];?>
</div>

<!-- ESTADO -->
<div class="form-group col-md-2">
  <label for="estado">Estado:</label>
<?php echo $row['estado'];?>

</div>


<!--CEP -->
<div class="form-group col-md-2">
  <label for="CEP">CEP:</label>
<?php echo $row['CEP'];?>
</div>

<!-- TEL -->
<div class="form-group col-md-3">
  <label for="telefone">Telefone:</label>
<?php echo $row['telefone'];?>
</div>

<!--CELULAR -->
<div class="form-group col-md-3">
  <label for="celular">Celular:</label>

</div>

<!--CPF -->
<div class="form-group col-md-2">
  <label for="CPF">CPF:</label>
<?php echo $row['CPF'];?>
</div>

<!-- CNPJ -->
<div class="form-group col-md-3">
  <label for="CNPJ">CNPJ:</label>
<?php echo $row['CNPJ'];?>
</div>
<!--EMAIL-->
<div class="form-group col-md-7">
  <label for="email">Email:</label>
<?php echo $row['email'];?>
</div>

<!--  -->
<div class="form-group col-md-12">
  <label for="textarea2">Obs:</label>
<?php echo $row['obs'];?>
</div>


<!--  -->
<div class="form-group col-md-12" style="width: 100%">
  <label for="textarea2">Cliente:</label><br>

  <?php
$CLI_subcli = mysqli_query ($DB_CONECT, "SELECT DISTINCT * FROM sisjur.clientes WHERE id = $row[idcliente]");
while ($_subcli = mysqli_fetch_assoc($CLI_subcli)) {
	
echo '<a style="cursor:pointer;" rel="clientes" value="'.$_subcli['id'].'"><div>'.$_subcli['nome'].'</div></a><br>';

}
?>

</div>


<div class="form-group col-md-12" style="overflow: scroll;  overflow-x: hidden; max-height: 200px">
  <label for="subcliente">Processos:</label><br>
  <?php

$pro_subcli_in = mysqli_query ($DB_CONECT, "SELECT * FROM processos WHERE idsubcliente = $row[idsubcliente]");
while ($pro_subcli = mysqli_fetch_assoc($pro_subcli_in)) {
	
echo '<a style="cursor:pointer; font-size:10px" rel="processos" value="'.$pro_subcli['id'].'"><div class="col-md-2" style="overflow:hidden">'.$pro_subcli['arquivamento'].'</div><div class="col-md-3" style="overflow:hidden">'.$pro_subcli['numero'].'</div><div class="col-md-7" style="overflow:hidden">'.$pro_subcli['obs'].'<br>'.'</div></a><br>';

}

?>

</div>

</div>


<?php
		break;
	case 'contrarios':
    

$sql = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.contrarios WHERE contrarios.id = $id ");
$row = mysqli_fetch_assoc($sql);
$id = $row['id'];
$nome = $row['nome'];
$end = $row['endereco'];
$email = $row['email'];
?>    


<div class="rows">
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Contrário</div>

<!--NOME-->
<div class="form-group">
  <label for="nome">Nome:</label>
<?php echo $nome ;?>
</div>
<!--ENDEREÇO -->
<div class="form-group col-md-6">
  <label for="endereco">Endereço:</label>
<?php $end;?>
</div>

<!--BAIRRO-->
<div class="form-group col-md-5">
  <label for="cidade"> Bairro:</label>
<?php echo $row['complemento'];?>
</div>

<!--CIDADE-->
<div class="form-group col-md-3">
  <label for="cidade"> Cidade:</label>
<?php echo $row['cidade'];?>
</div>

<!-- ESTADO -->
<div class="form-group col-md-2">
  <label for="estado">Estado:</label>
<?php echo $row['estado'];?>

</div>


<!--CEP -->
<div class="form-group col-md-2">
  <label for="CEP">CEP:</label>
<?php echo $row['CEP'];?>
</div>

<!-- TEL -->
<div class="form-group col-md-3">
  <label for="telefone">Telefone:</label>
<?php echo $row['telefone'];?>
</div>

<!--CELULAR -->
<div class="form-group col-md-3">
  <label for="celular">Celular:</label>

</div>

<!--CPF -->
<div class="form-group col-md-2">
  <label for="CPF">CPF:</label>
<?php echo $row['CPF'];?>
</div>

<!-- CNPJ -->
<div class="form-group col-md-3">
  <label for="CNPJ">CNPJ:</label>
<?php echo $row['CNPJ'];?>
</div>
<!--EMAIL-->
<div class="form-group col-md-7">
  <label for="email">Email:</label>
<?php echo $row['email'];?>
</div>

<!--  -->
<div class="form-group col-md-12">
  <label for="textarea2">Obs:</label>
<?php echo $row['obs'];?>
</div>

<div class="form-group col-md-12" style="overflow: scroll;  overflow-x: hidden; max-height: 200px">
  <label for="subcliente">Processos:</label><br>
  <?php
$con = "SELECT proc_con.processo FROM sisjur.proc_con WHERE contrario = $row[id]";
$pro_subcli_in = mysqli_query ($DB_CONECT, "SELECT * FROM sisjur.processos WHERE id in($con)");
while ($pro_subcli = mysqli_fetch_assoc($pro_subcli_in)) {
  
echo '<a style="cursor:pointer; font-size:10px" rel="processos" value="'.$pro_subcli['id'].'"><div class="col-md-2" style="overflow:hidden">'.$pro_subcli['arquivamento'].'</div><div class="col-md-3" style="overflow:hidden">'.$pro_subcli['numero'].'</div><div class="col-md-7" style="overflow:hidden">'.$pro_subcli['obs'].'<br>'.'</div></a><br>';

}

?>

</div>

</div>


<?php

    break;
  case 'advogados':
		
		break;
	case 'compromisso':
		
		break;
	default:
		# code...
		break;
}

?>















</div>