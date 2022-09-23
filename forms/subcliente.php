<div class="content">
<script type="text/javascript">
$(document).ready(function(){
validar_senha();
Subclientes();
});


</script>
<!--<form name="frmCadCliente" method="post" action="../act/actCadCliente.php" target="ifClientes">-->
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Sub Clientes</div>

<form name="subclientes" method="post">
<input type="hidden" name="id" id="id">
<!--NOME-->
<div class="form-group">
  <label for="nome">Nome:</label>
  <input type="text" class="form-control" name="nome" id="nome" maxlength="50" size="50">
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
<select class="form-control" name="estado" id="estado">
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
  <input type="text" class="form-control" name="CEP" id="CEP" maxlength="9" OnKeyPress="formatar(this, '#####-###')" placeholder="00000-000">
</div>

<!-- TEL -->
<div class="form-group col-md-3">
  <label for="telefone">Telefone:</label>
  <input type="text" class="form-control" name="telefone" id="telefone" maxlength="12" OnKeyPress="formatar(this, '## ####-####')" placeholder="00 0000-0000">
</div>

<!--CELULAR -->
<div class="form-group col-md-3">
  <label for="celular">Celular:</label>
  <input type="text" class="form-control" name="celular" id="celular" maxlength="13" OnKeyPress="formatar(this, '## #####-####')" placeholder="00 00000-0000">
</div>

<!--CPF -->
<div class="form-group col-md-2">
  <label for="CPF">CPF:</label>
  <input type="text" class="form-control" name="CPF" id="CPF" maxlength="14" OnKeyPress="formatar(this, '###.###.###-##')" placeholder="000.000.000-00">
</div>

<!-- CNPJ -->
<div class="form-group col-md-3">
  <label for="CNPJ">CNPJ:</label>
  <input type="text" class="form-control" name="CNPJ" id="CNPJ" maxlength="18" OnKeyPress="formatar(this, '##.###.###/####-##')" placeholder="00.000.000/0000-00">
</div>
<!--EMAIL-->
<div class="form-group col-md-7">
  <label for="email">Email:</label>
  <input type="text" class="form-control" name="email" id="email" maxlength="250" size="3">
</div>
<!--LOGIN-->
<div class="form-group col-md-6">
  <label for="login">Login:</label>
<input type="text" id="login" class="form-control" placeholder="Login" maxlength="16">
</div>
<!--SENHA-->
<div class="form-group col-md-6">
<div class="row">
<label for="senha">Senha:</label>
<div class="rows">
<div class="col-md-10">
<input type="text" name="senha" id="senha" maxlength="8" class="form-control" placeholder="Digite sua senha" required="on" style="width: 95%;">
</div>
</div>
</div>
<div id="pswd_info" class="col-md-14" style="position: relative;">
  <ul>
    <li id="letter" class="invalid">Pelo menos uma letra</li>
    <li id="capital" class="invalid">Pelo menos uma letra maiuscula</strong></li>
    <li id="number" class="invalid">Pele menos um numero</li>
    <li id="length" class="invalid">No minimo 8 caracteres</li>
  </ul>
</div>
</div>

<!--  -->
<div class="form-group col-md-6">
  <label for="textarea2">Obs:</label>
  <textarea name="obs" cols="70" rows="5" id="obs" class="form-control">
    
  </textarea>
</div>
<ul class="list-group col-md-6">
<label for="">Extras:</label><p></p>

    <li class="list-group-item">
    Receber Informações Processuais por e-mail
        <div class="material-switch pull-right">
        <input name="info" type="checkbox" id="info" value="0" checked="checked" />
        <label for="info" class="label-success"></label>
        </div>
    </li>
    <li class="list-group-item">
        Receber arquivos por e-mail
            <div class="material-switch pull-right">
            <input name="anexo" type="checkbox" id="anexo" value="0" checked="checked" />
            <label for="anexo" class="label-success"></label>
            </div>
    </li>
    <li class="list-group-item">
      Recebe compromissos por e-mail
        <div class="material-switch pull-right">
        <input name="rcompromisso" type="checkbox" id="rcompromisso" value="0" checked="checked" />
        <label for="rcompromisso" class="label-success"></label>
        </div>
    </li>
</ul>
<div class="list-group col-md-6">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Gravar" type="button submit" class="btn btn-success" value="Gravar" id="Gravar">
</div>
</form>
</div>