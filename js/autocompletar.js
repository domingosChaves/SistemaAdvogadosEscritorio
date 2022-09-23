$(document).ready(function(){

var tabela = $('form').attr('name');
  $('input').click(function(){
  var name = $(this).attr('name');
  

  switch(name){
    case('procorigem'): var campo = '#procorigem';break;
    case('numero'): var campo = '#numero';break;
    case('cliente'): var campo = '#cliente';break;
  }
    $(campo).autocomplete("autocompleta/completar.php?tabela="+tabela+"&campo="+name, {
        width:310,
        selectFirst: false
      });

    });

})
