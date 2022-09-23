<div class="content">
  <?php
  include_once("../db/conn.php");
  $sql = mysqli_query ($DB_CONECT, "SELECT * FROM tipoacao");
  while ($row = mysqli_fetch_assoc($sql)) {
  $tipoacao[] = "<option value='".$row['id']."'>".$row['descricao']."</option>";
  }
  ?>
  <script type="text/javascript">
    $(document).ready(function(){
    processos();
   });
</script>
<style type="text/css">

</style>
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Processos</div>
<form method="POST" enctype="multipart/form-data" name="processos" id="processos">

<input type="hidden" name="id" id="id"><!--hidden-->

<!--PROC. ORIGINAL-->
<div class="col-md-3  " id="procorigem_">
  <label for="procorigem">N° do Recurso:</label>
  <div class="inputContainer">
  <input type="text" class="form-control" name="arquivamento" id="arquivamento" required="required">
  <button onclick="validateProcesso('arquivamento',$('input#arquivamento'))" id="b_arquivamento" class="btn searchProcessos" type="button"></button>
  </div>
  </div>

<!--NUMERO DO RECURSO-->
<div class="col-md-3" id="numero_">
<label for="numero">N° Proc. Original:</label>
<div class="inputContainer">
  <input type="text" class="form-control" name="numero" id="numero" required="required">
  <button onclick="validateProcesso('numero',$('input#numero'))" id="b_numero" class="btn searchProcessos" type="button"></button>
</div>
</div>

<!--CLIENTE-->
<div class="col-md-6" id="clientes_">
  <label for="cliente">Cliente:</label>
  <div class="inputContainer">
  <input type="text" class="form-control" name="clientes" id="clientes" size="52" required="required">
  <button onclick="validateCliente('nome',$('input#clientes'))" class="btn searchProcessos" type="button"></button>
</div>
</div>
<br>
<!-- SUB CLIENTE -->
<div class="form-group col-md-7">
  <label for="subcliente">Sub Cliente: <button type="button" class="btn btn-default" id="add_subcliente" name="add_subcliente" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/add.png"></button></label>
  <div id="add_subcliente" style="display: none;">
    <input type="hidden" name="id_subcliente" id="id_subcliente"><!--hidden-->
  <input type="text" name="salvar_subcliente" class="form-control" rel='salvar_subcliente' size="60"><button type="button" name="salvar_subcliente" class="btn" id="salvar_subcliente" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/mais.png"></button><button type="button" name="close_subcliente" class="btn" id="close_subcliente" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/close.png"></button>
  </div>
  <div class="containerTela">
  <div id="view_subcliente" class="view_processos">
  </div>

  </div>
</div>

<!--ADVOGADO-->
<div class="form-group col-md-7">
  <label for="advogado">Audiencista: <button type="button" class="btn btn-default" id="add_advogado" name="add_advogado" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/add.png"></button></label>
  <div id="add_advogado" style="display: none;">
    <input type="hidden" name="id_advogado" id="id_advogado">
  <input type="text" name="salvar_advogados" class="form-control" rel="salvar_advogados" size="60"><button type="button" name="salvar_advogados" class="btn" id="salvar_advogados" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/mais.png"></button><button type="button" name="close_advogados" class="btn" id="close_advogados" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/close.png"></button>
  </div>
  <div class="containerTela">
  <div id="view_advogado" class="view_processos"></div>
</div>
</div>

<!--CONTRARIO-->
<div class="form-group col-md-7">
  <label for="contrario">Contrários: <button type="button" class="btn btn-default" id="add_contrario" name="add_contrario" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/add.png"></button></label>
  <div id="add_contrario" style="display: none;">
    <input type="hidden" name="id_contrarios" id="id_contrarios">
  <input type="text" name="salvar_contrarios" class="form-control" rel="salvar_contrarios" size="60"><button type="button" name="salvar_contrarios" class="btn" id="salvar_contrarios" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/mais.png"></button><button type="button" name="close_contrarios" class="btn" id="close_contrarios" style="border:none; background-color: rgba(255,255,255,0);"><img src="img/close.png"></button>
  </div>
  <div class="containerTela">
  <div id="view_contrario" class="view_processos"></div>
</div>
</div>
<!-- ACAO -->
<div class="form-group col-md-7">
<label for="acao">Tipo Ações:</label>
<div class="containerTela">
<div id="view_acoes" class="view_processos"></div>
</div>
</div>

<!--ARQUIVO-->
<div class="form-group col-md-7">

<label for="arquivo"><b>Arquivos: </b><label for="file" class="btn btn-default" style=" border:none; background-color: rgba(255,255,255,0);"><img src="img/clip.png"/></label>
<input name="arquivo[]" multiple="multiple" id="file" type="file" class="btn btn-primary" style="display: none;"> 
</label>
<!-- 
<div id='resposta_arquivos' class="view_processos"></div>
<div id="rsp_arq"></div>
<div class="progress progress-striped" style="width: 40%; display: none;">  
<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" id="progress"></div>
</div>
 -->
<button class="btn" type="button" id="anexar" style="font-size: 10px; display: none; border:none; background-color: rgba(255,255,255,0);"><img src="img/enviar.png"><br>Anexar</button>
<div class="containerTela">
<div id="view_arquivos" class="view_processos"></div>
</div>
</div>

<!--OBS -->
<div class="form-group col-md-7">
  <label for="textarea2">Obs:</label>
  <textarea name="obs" cols="100" rows="5" id="obs" class="form-control">
    
  </textarea>
</div>

<div class="list-group col-md-6">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar" id="Gravar">
</div>
</form>
<div id="ver_resultados">
  
</div>
</div>