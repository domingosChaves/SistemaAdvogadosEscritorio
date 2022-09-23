<div class="content">
  <script type="text/javascript">
    $('#Gravar').click(function(){
var nome = $('#nome').val();
var endereco = $('#endereco').val();
var numero = $('#numero').val();
var bairro = $('#bairro').val();
var cidade = $('#cidade').val();
var estado = $('#estado').val();
var cep = $('#CEP').val();
var telefone = $('#telefone').val();
var celular = $('#celular').val();
var cnpj = $('#CNPJ').val();
var email = $('#email').val();
var obs = $('#obs').val();
var receber_info = $('#info').val();


$.post({
        type:"POST",
        url:'cls/salvar/salvar_litisconsortes.php?nome='+nome+'&endereco='+endereco+'&numero='+numero+'&bairro='+bairro+'&cidade='+cidade+'&estado='+estado+'&cep='+cep+'&telefone='+telefone+'&celular='+celular+'&cnpj='+cnpj+'&email='+email+'&obs='+obs+'&receber_info='+receber_info,
        dataType:'text',
        success: function(res){
                                    
       },
      });
  })
  </script>
<div style="border-bottom: solid 0.3px rgba(0,0,0,0.4); padding: 1%; width: 100%; text-align: center; font-size: 25px; margin-bottom: 1%">Litisconsortes</div>
<form method="POST">

<!--NOME-->
<div class="form-group col-md-12">
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
  <label for="numero">Numero:</label>
  <input type="text" class="form-control" name="numero" id="numero" maxlength="10">
</div>
<!--BAIRRO-->
<div class="form-group col-md-5">
  <label for="bairro"> Bairro:</label>
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
  <label for="CNPJ">CNPJ:</label>
  <input type="text" class="form-control" name="CNPJ" id="CNPJ" maxlength="14">
</div>

<!--EMAIL-->
<div class="form-group col-md-8">
  <label for="email">Email:</label>
  <input type="text" class="form-control" name="email" id="email" maxlength="250" size="3">
</div>
<!--OBS -->
<div class="form-group col-md-12">
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
  </ul>
<div class="list-group col-md-10">
<input name="Excluir" type="button" class="btn btn-danger" value="Excluir">
<input name="Limpar" type="reset" class="btn btn-warning" value="Limpar">
<input name="Gravar" type="button" class="btn btn-success" value="Gravar" id="Gravar">
</div>
</form>























</div>