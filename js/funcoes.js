//------------------------------------------ FUNÇOES -----------------------------------------------------//
/************************************************************
LOGIN
*************************************************************/
function Login() {
  $("#Login").click(function(){
    var matricula = $('#matricula').val();
    var senha = $('#senha').val();
    var login = $('#Login').val();
    Login_ajax(matricula,senha,login);
  })
$("#matricula").focus(function(){
  $("#LoginInc").hide();
})
}
/************************************************************
LOGIN END
*************************************************************/

/************************************************************
INICIAL
*************************************************************/
function Inicial() {
  chamarPagina();
}
/************************************************************
INCIAL END
*************************************************************/






//------------------------------------- FUNÇOES ASSISTENTES ----------------------------------------------//
/************************************************************
LOGIN
*************************************************************/
function LoginAut(){
  $("#LoginAut").show();
  $("#LoginInc").hide();
  $("#LoginBlo").hide();
  $("#LoginNo").hide();
  $(location).attr('href', 'inicial.php');
}
function LoginInc(){
  $("#LoginAut").hide();
  $("#LoginInc").show();
  $("#LoginBlo").hide();
  $("#LoginNo").hide();
}
function LoginBlo(){
  $("#LoginAut").hide();
  $("#LoginInc").hide();
  $("#LoginBlo").show();
  $("#LoginNo").hide();
}
function LoginNo(){
  $("#LoginAut").hide();
  $("#LoginInc").hide();
  $("#LoginBlo").hide();
  $("#LoginNo").show();
}
/************************************************************
LOGIN END
*************************************************************/

/************************************************************
INICIAL
*************************************************************/
function mostraData()
{
    var mydate = new Date();
    var year = mydate.getYear();
    if (year < 1000)
        year += 1900;
    var day = mydate.getDay();
    var month = mydate.getMonth();
    var daym = mydate.getDate();
    if (daym < 10)
        daym="0"+daym;
    var dayarray = new Array("Domingo","Segunda-feira","Terça-feira","Quarta-feira","Quinta-feira","Sexta-feira","Sábado");
    var montharray = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
    document.write(dayarray[day]+"&nbsp;"+daym+" de "+montharray[month]+" de "+year);
}


function carregaPagina(pagina){
      switch(pagina){
      case('Processos'):var pagina = 'forms/processos.php'; var form = 'processos';break;
      case('Clientes'): var pagina = 'forms/clientes.php'; var form = 'clientes';break;
      case('Subclientes'): var pagina = 'forms/subcliente.php'; var form = 'subcliente';break;
      case('Audiencista'):var pagina = 'forms/audiencista.php'; var form = 'audiencista';break;
      case('Litisconsortes'):var pagina = 'forms/litisconsortes.php'; var form = 'litisconsortes';break;
      case('Contrarios'):var pagina = 'forms/contrarios.php'; var form = 'contrarios';break;
      case('Acoes'):var pagina = 'forms/acao.php'; var form = 'acao';break;
      case('Comarca'):var pagina = 'forms/comarca.php'; var form = 'comarcas';break;
      case('Compromissos'):var pagina = 'forms/compromissos.php'; var form = 'compromissos';break;
      case('Financeiro'):var pagina = 'forms/financeiro.php'; var form = 'financeiro';break;
      case('Contratacao'):var pagina = 'forms/contratacao.php'; var form = 'contratacao';break;
      case('b_inicial'):$(location).attr('href', 'inicial.php');break;
      case('b_email'):var pagina = 'rel/email.php'; var form = 'email';break;
      case('b_conf'):var pagina = 'conf/conf.php'; var form = 'configuracao';break;
      case('b_sair'):$(location).attr('href', 'logout.php');break;
  }
tirarCalenadario_ajax(pagina);
}

function chamarPagina() {
  $('button[rel=menuLateral]').click(function(){
    var botao = $(this).val();
    carregaPagina(botao);
  })
}
/************************************************************
INCIAL END
*************************************************************/

//--------------------------------------------AJAX -------------------------------------------------------//
/************************************************************
LOGIN
*************************************************************/
function Login_ajax(matricula,senha,login) {
      $.post({
      type:"POST",
      url:"cls/login.php?matricula="+matricula+"&senha="+senha+"&login="+login,
      dataType:"text",
      success: function(res){
        switch(res) {
        case 'OK': LoginAut(); break;
        case 'ERROR': LoginInc() ; break;
        case 'BLOQUEADO':   ;break;
        case 'EXCLUIDO': ;break;
        }
    
      }
    })

}
/************************************************************
LOGIN END
*************************************************************/


/************************************************************
INICIAL
*************************************************************/
function tirarCalenadario_ajax(pagina) {
    $.post({
    type:'POST',
    url: pagina,
    datatype:'text',
    success: function(res){
    $("#telaSessoes").children(".content").remove();
    $('#calendar').hide('slow');
        $("#telaSessoes").append(res);
      }
  });
}

/************************************************************
INCIAL END
*************************************************************/


//--------------------------------------- AUTO COMPLETA -------------------------------------------------//


//-------------------------------------------- CSS ------------------------------------------------------//


$(document).ready(function(){

Login()


  });

function formatar(src, mask)
{
var i = src.value.length;
var saida = mask.substring(0,1);
var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
{
src.value += texto.substring(0,1);
}
}




$(document).ready(function(){
var largura = $(window).width();
var altura = $(window).height();
var alturaHeader = $('header').height();
var larguraMenu = $('#menuLateral').width();
$("#telaSessoes").css({
        'width': largura-larguraMenu-10+'px',
        'height': altura+'px',
})
})







// PROCESSOS 


function resetProc(){
$('#id_procorigem').val('');
$('#numero').val('');
$('#id_nome').val('');
$('#clientes').val('');
$('#obs').val('')
}



function aut_proc(tabela,campo, valor){
  $.post({type:"POST",
        url:'db/preenche_form.php?tabela='+tabela+'&campo='+campo+'&query='+valor,
        dataType:"text",
        beforeSend:function(){resetProc();},
        success: function(res){
        $("#procorigem_").children(".content").remove();
        $("#procorigem_").append(res);
         setTimeout(function() {
var processo = $('#id_procorigem').val();
var cliente = $('#id_nome').val();
var subcliente = $('#id_subcliente').val();
        view(cliente);
        view_advogado($('#id_procorigem').val());
        view_contrario($('#id_procorigem').val());
        view_tipoacao($('#id_procorigem').val());
        view_arquivos($('#id_procorigem').val());
        $("#view_subcliente").show(400);
        $("#view_advogado").show(400);
        $("#view_contrario").show(400);
        $("#view_acoes").show(400);
        $("#view_arquivos").show(400);
        //alert("id_nome"+$('#id_procorigem').val()+"</br>"+"arquivamento="+$('#arquivamento').val()+"</br>"+"id_nome"+$('#id_nome').val()+"</br>"+"nome_cliente"+$('#clientes').val()+"</br>"+"OBS"+$('#obs').val())         
      }, 100);

         }});
}






function validateProcesso(campo, dados) {
  var dados =  dados.val();
  if (dados.length  == 0) {
    alert("vazio");
  }else{
    getProcesso(campo,dados)
    //alert(dados);
  }
}

function alertas(text){
  var ver = text.attr('name');
    alert(ver);
  };

function getProcesso(campo,dados) {

$.post({
  type:"POST",
  data:'campo='+campo+"&dados="+dados,
  url:"db/getProcesso/getProcesso.php",
  dataType:"json",
  success:function(json) {
var id = json[0]['main']['id'];
var arquivamento = json[0]['main']['arquivamento'];
var numero = json[0]['main']['numero'];
var cliente = json[1]['cliente'];
var subcliente = json[2]['subcliente'];
var audiencista = json[3]['advogado'];
var contrarios = json[4]['contrarios'];
var tipoacao = json[5]['tipoacao'];
var arquivos = json[6]['arquivos'];
var obs = json[0]['main']['obs'];

autoCompletaProcesso(id,arquivamento,numero,cliente,subcliente,audiencista,contrarios,tipoacao,arquivos,obs);

},
error: function(){
  alert('Deu um erro');
}
})
}


function autoCompletaProcesso(id,arquivamento,numero,cliente,subcliente,audiencista,contrarios,tipoacao,arquivos,obs) {
$('#id').val(id);
$('#arquivamento').val(arquivamento);
$('#numero').val(numero);
$('#clientes').val(cliente);

//SUBCLIENTE
$('#view_subcliente').html('');
if (subcliente.length <= 0) {//alert('vazio');
$('#view_subcliente').hide('fast')} else {//alert('tem algo');
$('#view_subcliente').show('fast');
$.each(subcliente,function(index,value){
  if (value == '') {} else {
    $('#view_subcliente').append('<li>'+value['nome']+'<button type="button" name="butao'+index+'" class="btn" rel="'+value['id']+'" onclick="alertas($(this))"><img src="../img/close2.png"></button></li>');
  }
  
})
}

//ADVOGADO
$('#view_advogado').html('');
if (audiencista.length <= 0) {//alert('vazio');
$('#view_advogado').hide('fast')} else {//alert('tem algo');
$('#view_advogado').show('fast');
$.each(audiencista,function(index,value){
  if (value == '') {} else {
    $('#view_advogado').append('<li>'+value['nome']+'<button type="button" name="butao'+index+'" class="btn" rel="'+value['id']+'" onclick="alertas($(this))"><img src="../img/close2.png"></button></li>');
  }
  
})
}
//CONTRARIOS
$('#view_contrario').html('');
if (contrarios.length <= 0) {//alert('vazio');
$('#view_contrario').hide('fast')} else {//alert('tem algo');
$('#view_contrario').show('fast');
$.each(contrarios,function(index,value){
  if (value == '') {} else {
    $('#view_contrario').append('<li>'+value['nome']+'<button type="button" name="butao'+index+'" class="btn" rel="'+value['id']+'" onclick="alertas($(this))"><img src="../img/close2.png"></button></li>');
  }
})
}
//TIPO ACOES
$('#view_acoes').html('');
$.each(tipoacao,function(index,value){
  if (value == '') {} else {
    $('#view_acoes').append('<li>'+value+'<button type="button" name="butao'+index+'" class="btn" onclick="alertas($(this))"><img src="../img/close2.png"></button></li>');
  }
})

//ARQUIVOS
$('#view_arquivos').html('');
if (arquivos.length <= 0) {//alert('vazio');
$('#view_arquivos').hide('fast')} else {//alert('tem algo');
$('#view_arquivos').show('fast');
$.each(arquivos,function(index,value){
  if (value == '') {} else {
    $('#view_arquivos').append('<li>'+value['nome']+'<button type="button" name="butao'+index+'" class="btn" rel="'+value['nome']+'" onclick="alertas($(this))"><img src="../img/close2.png"></button><button type="button" name="butao'+index+'" class="btn" rel="'+value['id']+'" onclick="alertas($(this))"><img src="../img/ver.png"></button></li>');
  }
})
}

$('#obs').html(obs);

}


function validateCliente(campo, dados){
  $.post({
  type:"POST",
  data:'campo='+campo+"&dados="+dados.val(),
  url:"db/getProcesso/getClienteProcesso.php",
  dataType:"text",
  success:function(json) {
// var id = json[0]['main']['id'];
// var arquivamento = json[0]['main']['arquivamento'];
// var numero = json[0]['main']['numero'];
// var cliente = json[1]['cliente'];
// var subcliente = json[2]['subcliente'];
// var audiencista = json[3]['advogado'];
// var contrarios = json[4]['contrarios'];
// var tipoacao = json[5]['tipoacao'];
// var arquivos = json[6]['arquivos'];
// var obs = json[0]['main']['obs'];

// autoCompletaProcesso(id,arquivamento,numero,cliente,subcliente,audiencista,contrarios,tipoacao,arquivos,obs);

},
error: function(){
  alert('Deu um erro');
}
})
}

function processos(){

var tabela = $('form').attr('name');
$('#arquivamento').typeahead({
name: 'arquivamento',
remote : 'db/autocomplete.php?tabela='+tabela+'&campo=arquivamento'+'&query=%QUERY',
})

$('#numero').typeahead({
name: 'numero',
remote : 'db/autocomplete.php?tabela='+tabela+'&campo=numero'+'&query=%QUERY',
})

$('#clientes').typeahead({
name: 'Clientes',
remote : 'db/autocomplete.php?tabela=clientes&campo=nome'+'&query=%QUERY',
})

$('input[rel=salvar_subcliente]').typeahead({
name: 'salvar_subcliente',
remote : 'db/autocomplete_subclientes.php?query=%QUERY',
})

$('#salvar_subcliente').click(function(){
var processo = $('#id_procorigem').val();
var cliente = $('#id_nome').val();
var subcliente = $('#id_subcliente').val();
$.post({
        type:"POST",
        url:'cls/salvar/salvar_subcliente-processo.php?processo='+processo+'&cliente='+cliente+'&subcliente='+subcliente,
        dataType:'text',
        success: function(res){
          $('input[rel=salvar_subcliente]').val('');
          $('#id_subcliente').val('');
          viewProcesso(processo,cliente,subcliente);
       }
      });

})


$('input[rel=salvar_advogados]').typeahead({
name: 'salvar_advogados',
remote : 'db/autocomplete_advogados.php?query=%QUERY',
}).blur(function(){
var tabela = 'advogados';
var campo = $(this).attr('name');
var valor = $(this).val();
$.post({type:"POST",
        url:'db/preenche_form.php?tabela='+tabela+'&campo='+campo+'&query='+valor,
        dataType:"text",
        success: function(res){
    $("#view_advogado").children(".content").remove();
    $("#view_advogado").append(res);        }
        });

})

$('input[rel=salvar_contrarios]').typeahead({
name: 'salvar_contrarios',
remote : 'db/autocomplete_contrarios.php?query=%QUERY',
}).blur(function(){
var tabela = 'contrarios';
var campo = $(this).attr('name');
var valor = $(this).val();
$.post({type:"POST",
url:'db/preenche_form.php?tabela='+tabela+'&campo='+campo+'&query='+valor,
dataType:"text",
success: function(res){
$("#view_contrario").children(".content").remove();
$("#view_contrario").append(res);        }
        });

})

// SUB CLIENTE
$('button#add_subcliente').click(function(){
  $('div#add_subcliente').toggle('fast');
});

$('button#salvar_subcliente').click(function(){
$('input[rel=salvar_subcliente]').val();
$('#id_nome').val();

})
$('button#close_subcliente').click(function(){
  setTimeout(function() {
  $('input[rel=salvar_subcliente]').val('');
  $('#id_subcliente').val('');

  $('div#add_subcliente').hide('fast'); 
  }, 300);
})

// ADVOGADO
$('button#add_advogado').click(function(){
  $('div#add_advogado').toggle('fast');
});
$('button#salvar_advogados').click(function(){
// cadastro de advogados
$('input[rel=salvar_advogados]').val('');
$('#id_advogado').val('');

})
$('button#close_advogados').click(function(){
  setTimeout(function() {
$('input[rel=salvar_advogados]').val('');
$('#id_advogado').val('');

   $('div#add_advogado').hide('fast'); 
  }, 300);
})


// CONTRARIOS
$('button#add_contrario').click(function(){
  $('div#add_contrario').show('fast');
});
$('button#salvar_contrarios').click(function(){
  // salvar contrarios
  alert('contrarios')
})
$('button#close_contrarios').click(function(){
  setTimeout(function() {
   $('div#add_contrario').hide('fast'); 
  }, 300);
})

// TIPO ACOES
$('button#add_acoes').click(function(){
  $('div#add_acoes').show('fast');
});
$('button#salvar_acoes').click(function(){
//salvar acoes
alert('acoes')
})
$('button#close_acoes').click(function(){
  setTimeout(function() {
   $('div#add_acoes').hide('fast');

  }, 300);
})

//FILES
$("#file").change(function(){
   var origem = $("#arquivamento").val();
  if (origem == "") {alert("Nenhum processo selecionado ou descrito!")}else{
    var files = $("#file")[0].files;
    var names = "";
    $.each(files, function(i, file){
      names += file.name + "<li id='arquivos'></li>";
    });

document.getElementById('resposta_arquivos').innerHTML = names;
$('#resposta_arquivos').show(300).addClass('cls_arq');
$("button#anexar").show(300);
}
})

function SendArqu(){
  var i;
    $('button#anexar').click(function(){
    $("#processos").ajaxSubmit({
    url:'cls/salvar/salvar_arquivos.php',
    type:"POST",
    beforeSend: function(){
$("#resposta_arquivos,button#anexar").hide(300);
$("#rsp_arq").children("#resposta_arq").remove();
$("#rsp_arq").append('');
progressBar();
},
    success: function(response){
    setTimeout(function(){resposta_arquivos(response);resetBar()}, 5000);
    setTimeout(function(){apagar_res()},7000);
    }
 });
});

}

function resposta_arquivos(res){
        $("#rsp_arq").show();
        $("#rsp_arq").children("#resposta_arq").remove();
        $("#rsp_arq").append(res);
}

function apagar_res(){
        $("#rsp_arq").hide(300);
        $("#rsp_arq").children("#resposta_arq").remove();
        view_arquivos($('#id_procorigem').val());

}

SendArqu();

function progressBar(){
  var i = 0;
  $('.progress').show();
  $('#progress').animate({  width: "100%"},4500);
  var progress = setInterval(function(){
  i++;
document.getElementById('progress').innerHTML = i+"%"},45);
setTimeout(function(){clearInterval(progress)},5000);
  }  
function resetBar(){
  $('#progress').css({width:"0%"});
  $('.progress').hide();
}

$('#Gravar').click(function(){
  $("form").ajaxSubmit({
    url:'cls/salvar/salvar_processos.php',
    type:"POST",
        success: function(res){
        }
        });
})     


 // FIM PROCESSOS CODIGO//
}
// FIM PROCESSOS FUNÇÃO//


  function excluir_arq(){
      $('button[class=close]').click(function(event){
        var id = $(this).val();
        $.post({
        type:"POST",
        url:'cls/excluir/exc_arq.php?id='+id,
        dataType:"text",
        success: function(){
        view_arquivos($('#id_procorigem').val());
        }
        });
      })}



function view(id){
  var id;
  $.post({type:"POST",
        url:'db/view/view_cliente.php?id='+id,
        dataType:"text",
        success: function(res){
          $("#view_subcliente").children(".content").remove();
          $("#view_subcliente").append(res);
        }
        });

}

function viewProcesso(processo,cliente,subcliente ){
  var processo;
  var cliente;
  var subcliente;
    $.post({type:"POST",
        url:'db/view/view_subcliente-processo.php?processo='+processo+'&cliente='+cliente+'&subcliente='+subcliente,
        dataType:"text",
        success: function(res){
          $("#view_subcliente").children(".content").remove();
          $("#view_subcliente").append(res);
        }
        });

}



function view_advogado(id){
  var id;
  $.post({type:"POST",
        url:'db/view/view_advogado.php?id='+id,
        dataType:"text",
        success: function(res){
          $("#view_advogado").children(".content").remove();
          $("#view_advogado").append(res);
        }
        });

}


function view_contrario(id){
  var id;
  $.post({type:"POST",
        url:'db/view/view_contrarios.php?id='+id,
        dataType:"text",
        success: function(res){
          $("#view_contrario").children(".content").remove();
          $("#view_contrario").append(res);
        }
        });

}

function view_tipoacao(id){
  var id;
  $.post({type:"POST",
        url:'db/view/view_acoes.php?id='+id,
        dataType:"text",
        success: function(res){
          $("#view_acoes").children(".content").remove();
          $("#view_acoes").append(res);
        }
        });

}

function view_arquivos(id){
  var id;
  $.post({type:"POST",
        url:'db/view/view_arquivos.php?id='+id,
        dataType:"text",
        success: function(res){
          $("#view_arquivos").addClass('view');
          $("#view_arquivos").children(".content").remove();
          $("#view_arquivos").append(res);
        }
        });

}


function clientes(){

$('#nome').typeahead({
name: 'nome',
remote : 'db/autocomplete_cliente.php?query=%QUERY',
}).blur(function(){
var tabela = $('form').attr('name');
var campo = $(this).attr('name');
var valor = $(this).val();
$.post({type:"POST",
        url:'db/preenche_form.php?tabela='+tabela+'&campo=nome&query='+valor,
        dataType:"text",
        success: function(res){
    		$("#nome_").children(".content").remove();
        $("#nome_").append(res);
        view($('#id_nome').val());
        $("#view_subcliente").show(400);
      }
        });

})




$('#add_subcliente_button').click(function(){
  $('#add_subcliente_input').show('fast', 300);
})



$('#Gravar').click(function(){
var nome = $('#nome').val();
var email = $('#email').val();
var login = $('#login').val();
var senha = $('#senha').val();
var obs = $('#obs').val();
var info = $('#info').val();
var anexo = $('#anexo').val();
var compromisso = $('#rcompromisso').val();
$.post({
        type:"POST",
        url:'cls/salvar/salvar_clientes.php?nome='+nome+'&email='+email+'&login='+login+'&senha='+senha+'&obs='+obs+'&info='+info+'&anexo='+anexo+'&rcompromisso='+compromisso,
        dataType:'text',
        success: function(res){
          alert('Cadastrado com sucesso');
          $("input[type=reset]").click();
       },
      });
  })

}



function validar_senha(){
  $('#senha').keyup(function() {
    var pswd = $(this).val();
        //validate the length
    if ( pswd.length < 4 ) {
      $('#length').removeClass('valid').addClass('invalid');
    } else {
      $('#length').removeClass('invalid').addClass('valid');
    }
    
    //validate letter
    if ( pswd.match(/[A-z]/) ) {
      $('#letter').removeClass('invalid').addClass('valid');
    } else {
      $('#letter').removeClass('valid').addClass('invalid');
    }

    //validate capital letter
    if ( pswd.match(/[A-Z]/) ) {
      $('#capital').removeClass('invalid').addClass('valid');
    } else {
      $('#capital').removeClass('valid').addClass('invalid');
    }

    //validate number
    if ( pswd.match(/\d/) ) {
      $('#number').removeClass('invalid').addClass('valid');
    } else {
      $('#number').removeClass('valid').addClass('invalid');
    }
    
  }).focus(function() {$('#pswd_info').show()}).blur(function() {$('#pswd_info').hide()});
}


function Subclientes(){
$('#Gravar').click(function(){
var nome = $('#nome').val();
var endereco = $('#endereco').val();
var numero = $('#numero').val();
var bairro = $('#bairro').val();
var cidade = $('#cidade').val();
var estado = $('#estado').val();
var cep = $('#CEP').val();
var telefone = $('#numero').val();
var celular = $('#telefone').val();
var cpf = $('#CPF').val();
var cnpj = $('#CNPJ').val();
var email = $('#email').val();
var login = $('#login').val();
var senha = $('#senha').val();
var obs = $('#obs').val();
var info = $('#info').val();
var anexo = $('#anexo').val();
var compromisso = $('#rcompromisso').val();

$.post({
        type:"POST",
        url:'cls/salvar/salvar_subclientes.php?nome='+nome+'&endereco='+endereco+'&numero='+numero+'&bairro='+bairro+'&cidade='+cidade+'&estado='+estado+'&cep='+cep+'&telefone='+telefone+'&celular='+celular+'&cpf='+cpf+'&cnpj='+cnpj+'&email='+email+'&login='+login+'&senha='+senha+'&obs='+obs+'&info='+info+'&anexo='+anexo+'&rcompromisso='+compromisso,
        dataType:'text',
        success: function(){
         $("input[type=reset]").click();         
       }
      });
  })

  
}

function calendarios(){
    var initialLocaleCode = 'pt-br';
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        var title = prompt('Event Title:');
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: start,
            end: end
          };
          $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
        }
        $('#calendar').fullCalendar('unselect');
      },
      displayEventTime: true, // don't show the time column in list view
      googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
      locale: initialLocaleCode,
      businessHours: true, // display business hours
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
    events: {
        url: 'calendar/demos/php/get-events.php',
        error: function() {
          $('#script-warning').show();
        }
      },
    });
}

function abrir_pesquisa(){
$('#pesquisar_extra').animate({
  width: "50%",
  padding: "2%",
  },300), $("#pesquisar").show('fast'),$("#titulo_pesq").html('');  
}

function fechar_pesquisa(){
$('#pesquisar_extra').animate({
  width: "4%",
  padding: "2%",
  },300), $("#pesquisar").hide('fast'),$("#titulo_pesq").html(''),$("#search").val(''),$("#opcoes option:first").prop('selected', true);  
}

function pesquisa(){
  $("#flip").click(function(e) {
    if($(this).is(':checked')) //Retornar true ou false
abrir_pesquisa();
    else
fechar_pesquisa();

  });
}

function chamar_table(){
$('#abrir').click(function(e){
pesquisa();
$("#flip").click();
var pagina = $(this).attr('value');
var tabela = $(this).attr('rel');
var campo = $(this).attr('rel2');
var valor = $(this).attr('rel3');
carregaPagina(pagina);
setTimeout(function(){
  $("#"+campo).val(valor);
aut_proc(tabela,campo, valor);  
},1000);
    })
$('a').click(function(){
table = $(this).attr('rel');
id = $(this).attr('value');
$.post({
type:'POST',
url: 'db/search/resul.php?tabela='+table+'&id='+id,
datatype:'text',
beforeSend: function(){
$("#painel_link").children(".painel_link").remove();
$("#painel_link").append('<div id="loading"><img src="img/loading.gif"></div>');  
},
success: function(res){
  $('#loading').remove();
$("#painel_link").children(".painel_link").remove();
$("#painel_link").append(res);
if ($('.painel_link').height() > 520) {
$('#painel_link').css({
'overflow': 'scroll',
'overflow-x':'hidden',
})
}
}
  });

})
}


function search(tabela,campo){
var dados = $("#search").val();
$.post({
type:'POST',
url: 'db/search/search.php?tabela='+tabela+'&campo='+campo+'&dados='+dados,
datatype:'text',
beforeSend: function(){
$("#painel_link").children(".painel_link").remove();
$("#painel_link").append('<div id="loading"><img src="img/loading.gif"></div>');  
},
success: function(res){
  $('#loading').remove();
$("#painel_link").children(".painel_link").remove();
$("#painel_link").append(res);
if ($('.painel_link').height() > 520) {
$('#painel_link').css({
'overflow': 'scroll',
'overflow-x':'hidden',
})
}
}
  });
}
function opcoes(tabela, campo){
$("#opcoes").change(function(){
tabela = $(this).find(':selected').closest('optgroup').attr('value');
titulo = $(this).find(':selected').closest('optgroup').attr('label');
campo = $(this).val();
$("#titulo_pesq").html(titulo);
$("#search").val('');
$("#search").focus();
})

$('#pes').click(function(){
search(tabela,campo);
})

$("#search").keypress(function(e){
  if (e.which==13) {
  search(tabela,campo);
  }
})
}
