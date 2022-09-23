<html>
<head>
<meta charset="utf-8">
</head>
<body>
<div class="content">
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Compromissos</div>

<form name="Compromissos" method="post">
  <div class="rows">
<!--DATA-->
<div class="form-group col-md-2" id="data_">
    <label for="nome">Data inicial:</label><br>
  <input type="date" class="form-control" name="data" id="data" style="text-align: center;">
</div>

<!--DATA-->
<div class="form-group col-md-2" id="data2_">
    <label for="nome">Data final:</label><br>
<input type="date" class="form-control" name="data2" id="data2" style="text-align: center;">
</div>


<!--HORA-->
<div class="form-group col-md-1" id="hora_">
    <label for="nome">Hora:</label><br>
  <input type="time" class="form-control" name="hora" id="hora" OnKeyPress="formatar(this, '00:00')" maxlength="5" style="text-align: center;">
</div>


<!--LOCAL-->
<div class="form-group col-md-9" id="local_">
    <label for="nome">Local:</label><br>
  <input type="text" class="form-control" name="local" id="local">
</div>

<!--PROCESSO-->
<div class="form-group col-md-9" id="processo_">
    <label for="nome">Processo:</label><br>
  <input type="text" class="form-control" name="processo" id="processo">
</div>
<div class="col-md-2"><button type="button" class="btn btn-default" style="margin-top: 26px">...</button></div>

<!--DESCRICAO-->
<div class="form-group col-md-9" id="descricao_">
    <label for="nome">Descrição:</label><br>
  <input type="text" class="form-control" name="descricao" id="descricao">
</div>
		
<!--OBSERVAÇOES-->
<div class="form-group col-md-9">
  <label for="obs">Obs:</label>
  <textarea name="obs" cols="70" rows="5" id="obs" class="form-control" wrap="virtual"></textarea>
</div>

<!--Processo-->
<div class="form-group col-md-3" id="alt_">
    <label for="nome">Ult. Alteração:</label><br>
  <div><i style="font-size: 12px">Ultima alteração do compromisso</i></div>
</div>

<div class="list-group col-md-6">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar" id="Gravar">
</div>
</div>
</form>
</div>
</body>
