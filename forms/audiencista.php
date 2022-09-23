<div class="content">
<?php
  include_once("../db/conn.php");
  $sql = mysqli_query ($DB_CONECT, "SELECT * FROM bancos");
  while ($row = mysqli_fetch_assoc($sql)) {
      $bancos[] = "<option value='".$row['banco']."'>".$row['banco']."</option>";
  }
  ?>
<script type="text/javascript">
$(document).ready(function(){

$('#Gravar').click(function(){
var nome = $('#nome').val();
var oab = $('#OAB').val();
var tipo = $('#tipo').val();
var endereco = $('#endereco').val();
var numero = $('#numero').val();
var bairro = $('#bairro').val();
var cidade = $('#cidade').val();
var estado = $('#estado').val();
var cep = $('#CEP').val();
var telefone = $('#telefone').val();
var celular = $('#celular').val();
var cpf = $('#CPF').val();
var email = $('#email').val();
var banco = $('#banco').val();
var agencia = $('#agencia').val();
var conta = $('#conta').val();
var op = $('#op').val();
var tipo_conta = $('#tipo_conta').val();
var obs = $('#obs').val();
var receber_info = $('#info').val();
var receber_arq = $('#anexo').val();


$.post({
        type:"POST",
        url:'cls/salvar/salvar_audiencista.php?nome='+nome+'&oab='+oab+'&tipo='+tipo+'&endereco='+endereco+'&numero='+numero+'&bairro='+bairro+'&cidade='+cidade+'&estado='+estado+'&cep='+cep+'&telefone='+telefone+'&celular='+celular+'&cpf='+cpf+'&email='+email+'&banco='+banco+'&agencia='+agencia+'&conta='+conta+'&op='+op+'&tipo_conta='+tipo_conta+'&obs'+obs+'&receber_info='+receber_info+'&receber_arq='+receber_arq,
        dataType:'text',
        success: function(res){
                  
       }
      });
  })

  })
</script>
 <!--<form name="frmCadAdvogado" method="post" action="../act/actCadAdvogado.php" target="ifAdvogados">-->
 <div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Audiencista</div>
<form method="POST">

<!--NOME-->
<div class="form-group col-md-8">
  <label for="nome">Nome:</label>
  <input type="text" class="form-control" name="nome" id="nome" maxlength="50" size="50">
</div>

<!--OAB -->
<div class="form-group col-md-2">
  <label for="OAB">OAB:</label>
  <input type="text" class="form-control" name="OAB" id="OAB" maxlength="70">
</div>

<!--TIPO -->
<div class="form-group col-md-2">
  <label for="tipo">Tipo:</label><br>
	<select name="tipo" id="tipo" class="form-control">
		<option value="INT">Interno</option>
		<option value="EXT">Externo</option>
		<option value="OUT">Outros</option>
	</select>
</div>

<!--ENDEREÇO -->
<div class="form-group col-md-6">
  <label for="endereco">Endereço:</label>
  <input type="text" class="form-control" name="endereco" id="endereco" maxlength="70">
</div>

<!--NUMERO -->
<div class="form-group col-md-1">
  <label for="complemento">Numero:</label>
  <input type="text" class="form-control" name="complemento" id="numero" maxlength="10">
</div>
<!--BAIRRO-->
<div class="form-group col-md-5">
  <label for="cidade"> Bairro:</label>
  <input type="text" class="form-control" name="bairro" id="bairro" maxlength="25">
</div>

<!--CIDADE-->
<div class="form-group col-md-3">
  <label for="cidade"> Cidade:</label>
  <input type="text" class="form-control" name="cidade" id="cidade" maxlength="25">
</div>

<!-- ESTADO -->
<div class="form-group col-md-1">
  <label for="estado">Estado:</label>
<select class="form-control" name="estado" id="estado" onchange="">
<option value="">-UF-</option>
    <option value="MA">MA</option>
    <option value="AC">AC</option>
    <option value="AL">AL</option>
    <option value="AM">AM</option>
    <option value="AP">AP</option>
    <option value="BA">BA</option>
    <option value="CE">CE</option>
    <option value="DF">DF</option>
    <option value="ES">ES</option>
    <option value="GO">GO</option>
    <option value="MG">MG</option>
    <option value="MT">MT</option>
    <option value="Ms">MS</option>
    <option value="PA">PA</option>
    <option value="PE">PE</option>
    <option value="PB">PB</option>
    <option value="PI">PI</option>
    <option value="PR">PR</option>
    <option value="RN">RN</option>
    <option value="RO">RO</option>
    <option value="RJ">RJ</option>    
    <option value="RR">RR</option>
    <option value="RS">RS</option>
    <option value="SP">SP</option>
    <option value="SC">SC</option>
    <option value="TO">TO</option>
</select>
</div>


<!--CEP -->
<div class="form-group col-md-2">
  <label for="CEP">CEP:</label>
  <input type="text" class="form-control" name="CEP" id="CEP" maxlength="8">
</div>

<!-- TEL -->
<div class="form-group col-md-3">
  <label for="telefone">Telefone:</label>
  <input type="text" class="form-control" name="telefone" id="telefone" maxlength="15">
</div>

<!--CELULAR -->
<div class="form-group col-md-3">
  <label for="celular">Celular:</label>
  <input type="text" class="form-control" name="celular" id="celular" maxlength="15">
</div>

<!--CPF -->
<div class="form-group col-md-4">
  <label for="CPF">CPF:</label>
  <input type="text" class="form-control" name="CPF" id="CPF" maxlength="14">
</div>

<!--EMAIL-->
<div class="form-group col-md-8">
  <label for="email">Email:</label>
  <input type="text" class="form-control" name="email" id="email" maxlength="250" size="3">
</div>
<!--TIPO -->
<div class="form-group col-md-10" style="border: solid 1px rgba(0,0,0,0.2); padding: 3%; width: 100%">
  <label>Dados Bancários:</label><br>
<div class="row">
<div class="col-md-4">
  <label for="banco">Banco:</label><br>
	<select name="banco" id="banco" class="form-control">
    <option>--ESCOLHA UM BANCO--</option>
  <?php
for ($i=0; $i < count($bancos); $i++) { 
  echo $bancos[$i];
}
  ?>

  </select>
</div>
<div class="col-md-2">
  <label for="agencia">Agencia:</label><br>
  <input type="text" name="agencia" id="agencia" class="form-control">
</div>

<div class="col-md-2">
  <label for="conta">Conta:</label><br>
  <input type="text" name="conta" id="conta" class="form-control">
</div>

<div class="col-md-1">
  <label for="op">Op:</label><br>
  <input type="text" name="op" id="op" class="form-control">
</div>
<div class="col-md-3">
  <label for="tipo_conta">Tipo Conta:</label><br>
  <select name="tipo_conta" id="tipo_conta" class="form-control">
    <option value="corrente">Conta Corrente</option>
    <option value="poupanca">Conta Poupança</option>
    <option value="salario">Conta Salário</option>
  </select>
</div>
  </div>
</div>

<!--OBS -->
<div class="form-group col-md-5">
  <label for="textarea2">Obs:</label>
  <textarea name="obs" cols="9" rows="3" id="obs" class="form-control">
    
  </textarea>
</div>
<ul class="list-group col-md-6">
<label for="">Extras:</label>
    <li class="list-group-item">
    Receber Informações Processuais por e-mail
        <div class="material-switch pull-right">
        <input name="info" type="checkbox" id="info" value="0"/>
        <label for="info" class="label-success"></label>
        </div>
    </li>
    <li class="list-group-item">
        Receber arquivos por e-mail
            <div class="material-switch pull-right">
            <input name="anexo" type="checkbox" id="anexo" value="0"/>
            <label for="anexo" class="label-success"></label>
            </div>
    </li>
  </ul>
<div class="list-group col-md-10">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar" id="Gravar">
</div>
</form>
</div>