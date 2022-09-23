<script language="JavaScript" type="text/JavaScript">
/*
function abrirLocalizar() {
	window.name='centro'; 
	var popup = null;
	popup = window.open('../loc/lTipoAcao.php?f=frmCadTipoAcao',
		'localizar',
		'toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=300,width=540');
	if (popup != null) {
		if (popup.opener != null) {
			popup.opener = self;
		}
	}
}
*/
</script>

<div class="content">
 <div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Tipos de Ação</div>
<form method="POST">
<!--DESCRICAO-->
<div class="form-group col-md-8">
  <label for="descricao">Descrição:</label>
  <input type="text" class="form-control" name="descricao" id="descricao">
</div>
<!--OBS -->
<div class="form-group col-md-8">
  <label for="textarea2">Obs:</label>
  <textarea name="obs" cols="9" rows="3" id="textarea2" class="form-control">
    
  </textarea>
</div>

<div class="list-group col-md-10">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Localizar" type="button" class="btn btn-primary" value="Localizar">
<input type="hidden" value="" name="id" id="id">
</div>
</form>
</div>