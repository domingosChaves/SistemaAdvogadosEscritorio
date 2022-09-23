<html>
<head>
<title>Cadastro de <?= ucfirst($XMLForm->getTitulo()) ?></title>
<script language="JavaScript" type="text/JavaScript">
<!--
function onSubmit() {
	return true;
}
function actExcluir() {
	var id = document.getElementById('idcontratacao').value;
	if (id == "") {
		alert("Não há o que excluir");
		return;
	}
	if (!confirm("Deseja realmente excluir?")) return;
	var form = document.getElementById('frmContratacao');
	document.getElementById('acao').value = 'apagar';
	form.submit();
	document.getElementById('acao').value = '';
	document.getElementById('idcontratacao').value = '';
}
function actFinalizar() {
	var id = document.getElementById('idcontratacao').value;
	if (id == "") {
		alert("Não há contratação a finalizar");
		return;
	}
	var status = document.getElementById('status').value;
	if (status == 0) {
		alert("Contratação não pode ser finalizada. Precisa ser executada primeiro.");
		return;
	}
	if (status == 2) {
		alert("Contratação já finalizada.");
		return;
	}	
	var form = document.getElementById('frmContratacao');
	document.getElementById('acao').value = 'finalizar';
	form.submit();
	document.getElementById('acao').value = '';
	document.getElementById('idcontratacao').value = '';	
}
function actLimpar()
{
	document.getElementById('frmContratacao').reset();
	document.getElementById('frmContratacao').reset();
	document.getElementById('idcontratacao').value = '';
	document.getElementById('idplanocontacliente').value = '';
	document.getElementById('idplanocontaadvogado').value = '';
	document.getElementById('idcontratacao').value = '';
	document.getElementById('idprocesso').value = '';
	document.getElementById('idcliente').value = '';
	document.getElementById('idadvogado').value = '';	
	document.getElementById('Finalizar').disabled = true;
	document.getElementById('Finalizar').style.color = 'black';
	clearBackgroundInputs();
}
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
function abrirLocalizar() {
	window.name='centro'; 
	var popup = null;
	popup = window.open('../loc/lContratacao.php?f=frmContratacao',
		'localizar',
		'toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=450,width=640');
	if (popup != null) {
		if (popup.opener != null) {
			popup.opener = self;
		}
	}
}
function carregaCidades() {	
	//cidadesporuf('estado', 'cidade');
}
function carregaCliente() {	
	//ClientePorId('idcliente', 'nomeCliente');
}
function onautocompletar(campoTexto, campoId, valorNome, valorId)
{	
	//
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body onload="document.getElementById('historico').focus();">
<br>
<table width="470" height="20"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="tituloForm"><div align="center"><?= $XMLForm->getTitulo() ?></div></td>
  </tr>
</table>
<div id="Layer1">
<table width="100%" height="224"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">	
	<form name="frmContratacao" id="frmContratacao" method="post" action="../act/actContratacao.php" target="iframe" onSubmit="onSubmit();">
      <table width="100%" height="183"  border="0" cellpadding="0" cellspacing="0" class="texto">
        <tr>
          <td width="44%" height="145" valign="top">
		  <table width="450" height="202"  border="0" cellpadding="0" cellspacing="0" class="texto">	
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('historico');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="text" class="text" size="70" maxlength="250" name="historico" id="historico">
				</td>
			</tr>
			<tr>
                <td class="tabRotulo">
                <div align="right">
                <?php
                    $campo = $XMLForm->getCampo('idprocesso');
                    echo ucfirst($campo['nome']) . ':';
                ?>
                </div>
                </td>
                <td class="tabForm">
                <input type="hidden" value="" name="idprocesso" id="idprocesso">
                <input type="text" class="text" autocomplete="off" id="numeroProcesso" name="numeroProcesso" size="30" maxlength="50" onkeyup="autocompletar_campo('processos', 'numero', 'numeroProcesso', 'idprocesso', event)" onblur="autocompletar_blur(this, 'idprocesso');">
                <div id="autocompletar" class="autocomplete"><span>...</span></div>
                <img src="../img/search.gif" border="0" align="top" onClick="window.name='centro'; window.open('../loc/localizar.php?f=frmContapagar','localizar','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=500,width=600')" style="cursor: pointer">
                </td>
            </tr>
			<tr><td class="tabRotulo"><div align="right" style="color: #0000aa"><strong>Cliente</strong></div></td><td>&nbsp;</td></tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('idcliente');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">			
				<input type="hidden" value="" name="idcliente" id="idcliente">
				<input type="text" class="text" autocomplete="off" id="descricaoCliente" name="descricaoCliente" size="30" maxlength="50" onkeyup="autocompletar_campo('clientes', 'nome', 'descricaoCliente', 'idcliente', event)" onblur="autocompletar_blur(this, 'idcliente');">
				<img src="../img/search.gif" border="0" align="top" onClick="window.name='centro'; window.open('../loc/lCliente.php?f=frmContapagar','localizar','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=500,width=600')" style="cursor: pointer">
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('idplanocontacliente');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="hidden" value="" name="idplanocontacliente" id="idplanocontacliente">
				<input type="text" class="text" autocomplete="off" id="descricaoPlanoContaCliente" name="descricaoPlanoContaCliente" size="30" maxlength="50" onkeyup="autocompletar_campo('gastos', 'descricao', 'descricaoPlanoContaCliente', 'idplanocontacliente', event)" onblur="autocompletar_blur(this, 'idplanocontacliente');" onchange="autocompletar_change(this, 'idplanocontacliente');">
				<img src="../img/search.gif" border="0" align="top" onClick="window.name='centro'; window.open('../loc/lGastos.php?f=frmContapagar','localizar','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=500,width=600')" style="cursor: pointer">
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('valor_receber');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="text" class="text" size="11" maxlength="9" onKeyPress="FormataFloat(valor_receber, event);" onBlur="formata_float(valor_receber, event);" name="valor_receber" id="valor_receber">
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('vencimento');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="text" class="text" size="12" maxlength="10" onKeyPress="formataData(this)" name="vencimento" id="vencimento">
				<img src="../img/calendar.gif" border="0" align="absmiddle" style="cursor: pointer" onClick="javascript:abrirCalendario('vencimento');"/>
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('obs');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<textarea name="obs" id="obs" rows="4" cols="45" class="text"></textarea>
				</td>
			</tr>
			<tr><td class="tabRotulo"><div align="right" style="color: #0000aa"><strong>Advogado</strong></div></td><td>&nbsp;</td></tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('idadvogado');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">				
				<input type="hidden" value="" name="idadvogado" id="idadvogado">
				<input type="text" class="text" autocomplete="off" id="descricaoAdvogado" name="descricaoAdvogado" size="30" maxlength="50" onkeyup="autocompletar_campo('advogados', 'nome', 'descricaoAdvogado', 'idadvogado', event)" onblur="autocompletar_blur(this, 'idadvogado');">
				<img src="../img/search.gif" border="0" align="top" onClick="window.name='centro'; window.open('../loc/lAdvogado.php?f=frmContapagar','localizar','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=500,width=600')" style="cursor: pointer">
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('idplanocontaadvogado');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="hidden" value="" name="idplanocontaadvogado" id="idplanocontaadvogado">
				<input type="text" class="text" autocomplete="off" id="descricaoPlanoContaAdvogado" name="descricaoPlanoContaAdvogado" size="30" maxlength="50" onkeyup="autocompletar_campo('gastos', 'descricao', 'descricaoPlanoContaAdvogado', 'idplanocontaadvogado', event)" onblur="autocompletar_blur(this, 'idplanocontaadvogado');" onchange="autocompletar_change(this, 'idplanocontaadvogado');">
				<img src="../img/search.gif" border="0" align="top" onClick="window.name='centro'; window.open('../loc/lGastos.php?f=frmContapagar','localizar','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=500,width=600')" style="cursor: pointer">
				</td>
			</tr>	
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('valor_pagar');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="text" class="text" size="11" maxlength="9" onKeyPress="FormataFloat(valor_pagar, event);" onBlur="formata_float(valor_pagar, event);" name="valor_pagar" id="valor_pagar">
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('vencimento_execucao');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="text" class="text" size="12" maxlength="10" onKeyPress="formataData(this)" name="vencimento_execucao" id="vencimento_execucao">
				<img src="../img/calendar.gif" border="0" align="absmiddle" style="cursor: pointer" onClick="javascript:abrirCalendario('vencimento_execucao');"/>
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('obs_advogado');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<textarea name="obs_advogado" id="obs_advogado" rows="4" cols="45" class="text" readonly="true"></textarea>
				</td>
			</tr>
			<tr><td class="tabRotulo"><div align="right" style="color: #0000aa"><strong>&nbsp;</strong></div></td><td>&nbsp;</td></tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('documento');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="text" class="text" size="20" maxlength="15" name="documento" id="documento">
				</td>
			</tr>
			<tr>
				<td class="tabRotulo">
				<div align="right">
				<?php
					$campo = $XMLForm->getCampo('status');
					echo ucfirst($campo['nome']) . ':';
				?>
				</div>
				</td>
				<td class="tabForm">
				<input type="hidden" value="0" name="status" id="status">
				<input type="text" class="text" size="20" maxlength="3" name="descricaoStatus" id="descricaoStatus" readonly="true" style="background-Color: #ffffff;"">
				</td>
			</tr>			
		  	<tr>
              <td class="tabRotulo"><div align="right"></div></td>
              <td class="tabForm">
              	<input name="Gravar" type="submit" class="button" value="Gravar">
                <input name="Excluir" type="button" class="button" onClick="actExcluir();" value="Excluir">
                <input name="Limpar" type="reset" class="button" onClick="actLimpar();" value="Limpar">
				<input name="Localizar" type="button" class="button" onClick="abrirLocalizar();" value="  Localizar" style="background-image:url(../img/search.gif); background-repeat:no-repeat;">
				<input name="Finalizar" id="Finalizar" type="button" class="button" onClick="actFinalizar();" value="  Finalizar" style="background-color: #cccccc; color: black" disabled="true">
                <input type="hidden" value="" name="idcontratacao" id="idcontratacao">
                <input type="hidden" value="" name="acao" id="acao">
              </td>
            </tr>
          </table></td>       
        </tr>
      </table>
      </form>
      </td>
  </tr>
</table>
</div>
<iframe width="0" height="0" style="top:300px; left: 100px;" id="iframe" name="iframe" src="" frameborder="0"></iframe>
</body>
</html>