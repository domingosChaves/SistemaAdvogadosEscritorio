<div class="content">
<style type="text/css">
</style>
<script type="text/javascript">
$(document).ready(function(){
validar_senha();
clientes();
$('button#add_subcliente').click(function(){
  $('div#add_subcliente').show('fast');
});
$('button#salvar_subcliente').click(function(){
var subcliente = $('input[rel=salvar_subcliente]').val();
var cliente = $('#id_nome').val();
$.post({
        type:"POST",
        url:'cls/salvar/salvar_subcliente-clientes.php?id='+cliente+'&nome='+subcliente,
        dataType:'text',
        success: function(res){
          view($('#id_nome').val());
          $('input[rel=salvar_subcliente]').val('');
       },
      });


})
$('button#close_subcliente').click(function(){
  setTimeout(function() {
  $('input[rel=salvar_subcliente]').val('');
  $('div#add_subcliente').hide('fast'); 
  }, 300);
})

$('input[rel=salvar_subcliente]').typeahead({
name: 'salvar_subcliente',
remote : 'db/autocomplete_subclientes.php?query=%QUERY',
});

$('input[type=checkbox]').click(function(){
if ($(this).attr('checked','checked')) $(this).val('V');
})



});
</script>
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Clientes</div>
<div id="resposta"></div>
<form name="clientes" method="post">

<!--NOME-->
<div class="form-group" id="nome_">
    <label for="nome">Nome:</label><br>
  <input type="hidden" name="id_nome" id="id_nome">
  <input type="text" class="form-control" name="nome" id="nome" maxlength="50" size="92">
</div>

<!--EMAIL-->
<div class="form-group col-md-8">
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
<label for="login">Senha:</label>
<div class="rows">
<div class="col-md-10">
<input type="text" name="senha" id="senha" maxlength="8" class="form-control" placeholder="Digite uma senha" required="on" style="width: 95%;">
</div>
</div>
</div>
<div id="pswd_info" class="col-md-14" style="position: relative;">
  <ul>
    <li id="letter" class="invalid">Pelo menos uma letra</li>
    <li id="capital" class="invalid">Pelo menos uma letra maiuscula</strong></li>
    <li id="number" class="invalid">Pele menos um numero</li>
    <li id="length" class="invalid">No minimo 4 caracteres</li>
  </ul>
</div>
</div>

<!-- SUB CLIENTE -->
<div class="form-group col-md-10">
  <label for="subcliente">Sub Cliente: <button type="button" class="btn btn-default" id="add_subcliente" name="add_subcliente"><img src="img/add.png"></button></label>
  <div id="add_subcliente" style="display: none;">
  <input type="text" name="salvar_subcliente" class="form-control" rel='salvar_subcliente' size="60"><button type="button" name="salvar_subcliente" class="btn" id="salvar_subcliente"><img src="img/mais.png"></button><button type="button" name="close_subcliente" class="btn" id="close_subcliente"><img src="img/close.png"></button>
  </div>
  <div id="view_subcliente" class="view"></div>
</div>


<!--OBSERVAÇOES-->
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
        <input name="info" type="checkbox" id="info" value="F" />
        <label for="info" class="label-success"></label>
        </div>
    </li>
    <li class="list-group-item">
        Receber arquivos por e-mail
            <div class="material-switch pull-right">
            <input name="anexo" type="checkbox" id="anexo" value="F" />
            <label for="anexo" class="label-success"></label>
            </div>
    </li>
    
    <li class="list-group-item">
      Recebe compromissos por e-mail
        <div class="material-switch pull-right">
        <input name="rcompromisso" type="checkbox" id="rcompromisso" value="F" />
        <label for="rcompromisso" class="label-success"></label>
        </div>
    </li>
</ul>
<div class="list-group col-md-6">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar" id="Limpar">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar" id="Gravar">
</div>
</form>
</div>