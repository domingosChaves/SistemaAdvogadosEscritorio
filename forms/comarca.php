<div class="content">
 <div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Comarca</div>
<form method="POST" name="comarcas">
<!--NOME-->
<div class="form-group col-md-8">
  <label for="nome">Comarca:</label>
  <input type="text" class="form-control" name="vara" id="vara">
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


<!--OBS -->
<div class="form-group col-md-8">
  <label for="textarea2">Obs:</label>
  <textarea name="obs" cols="9" rows="3" id="textarea2" class="form-control">
    
  </textarea>
</div>

<div class="list-group col-md-10">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar">
</div>
</form>
</div>