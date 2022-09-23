<html>

<head>
  <title>Sisjur</title>
  <meta http-equiv="Content-Type" content="text/html">
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" href="img/rr.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="calendar/fullcalendar.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker3.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/typeahead.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="js/jqueryForm.min.js"></script>
  <script type="text/javascript" src="js/funcoes.js"></script>
  <script src="calendar/moment.min.js"></script>
  <script src="calendar/fullcalendar.min.js"></script>
  <script src="calendar/locale-all.js"></script>
  <script type="text/javascript" src="js/storage.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    calendarios();
    pesquisa();
    Inicial();
    var tabela ="";
    var campo = "";
    opcoes(tabela, campo);
    });
  </script>
  <style type="text/css">
    #loading {
      position: relative;
      left: 20%;
      top: 20%
    }
  </style>
</head>

<body style="width: 100%;background: rgba(0,0,0,0.03);">
  <header>
    <div id="dados-usuario" style="float: right; font-family: Ubuntu; font-size: 15px; color: rgb(255, 255, 255); padding: 0.5%; z-index: 1;">
      <a href="#menu" style="color: #ffffff">
        <img src="img/user1.png">&nbsp; &nbsp;
        <?php 
        session_start();
        echo $_SESSION['matricula'];?>
      </a>
      <br>
      <script type="text/javascript">
        mostraData();
      </script>
      <br>
      <br>
      <button type="button" style="background: rgba(255,255,255,0);" class="btn" rel="menuLateral" value="b_inicial">
        <img src="img/home.png">
      </button>&nbsp; &nbsp;&nbsp; &nbsp;
      <button type="button" style="background: rgba(255,255,255,0);" class="btn" rel="menuLateral" value="b_email">
        <img src="img/mail.png">
      </button>&nbsp; &nbsp;&nbsp; &nbsp;
      <button type="button" style="background: rgba(255,255,255,0);" class="btn" rel="menuLateral" value="b_conf">
        <img src="img/config.png">
      </button>&nbsp; &nbsp;&nbsp; &nbsp;
      <button type="button" style="background: rgba(255,255,255,0);" class="btn" rel="menuLateral" value="b_sair">
        <img src="img/logoff.png">
      </button>&nbsp; &nbsp; </div>
    <div style="width: 100%; background: rgba(0, 0, 0, 0.8); padding: 0.7%;">
      <!--LOGO-->
      <img src="img/SISJUR ATUAL.png" style="margin: 0.5%"> </div>
  </header>
  <nav class="bandeja">
    <div id="menuLateral">
      <li>
        <button rel="menuLateral" class="btn" value="Processos"> Processos </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Clientes"> Clientes </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Subclientes"> Sub Clientes </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Audiencista"> Audiencista </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Litisconsortes"> Litisconsortes</button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Contrarios"> Contrários </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Acoes"> Ações </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Comarca"> Comarca </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Compromissos"> Compromissos </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Financeiro"> Financeiro </button>
      </li>
      <li>
        <button rel="menuLateral" class="btn" value="Contratacao"> Contratação </button>
      </li>
    </div>
    <div id="telaSessoes" class="">

<?php 

// include 'cls/GET/GetProcessos.php';

?>


      <div id="calendar" class=""></div>
    </div>
    <div id="pesquisar_extra" style="border:solid 1px rgba(0,0,0,0.03);" class="h-100">
      <input type="checkbox" name="flip" id="flip" style="display:none;"> <label for="flip" class="btn" style="float: right;"></label>
      <div style="width: 93%; display: none;" id="pesquisar">
        <div style="width: 100%">
          <fieldset>
            <legend id="titulo_pesq"></legend> <select class="btn" id="opcoes" style="-moz-appearance:none; text-align: center; border: solid 1px rgba(0,0,0,0.2);position: absolute; left:1.5%; z-index: 10; margin: 0%;font-family:Ubuntu; font-size: 15px; text-align: center; font-weight: bold; color: rgba(0,0,0,0.4);">
  <option value="vazio">Filtros</option>
  <optgroup label="Processos" value="processos">
    <option value="arquivamento">Nº Rec:</option>
    <option value="numero">Nº Pro:</option>
  </optgroup>

  <optgroup label="Clientes" value="clientes">
    <option value="nome">Nome:</option>
    <option value="apelido">Apelido:</option>
  </optgroup>

 <optgroup label="Sub-Clientes" value="subcliente">
    <option value="nome">Nome:</option>
    <option value="apelido">Apelido:</option>
  </optgroup>

 <optgroup label="Autor" value="contrarios">
    <option value="nome">Nome:</option>
    <option value="apelido">Apelido:</option>
  </optgroup>

<optgroup label="Audiencista" value="advogados">
    <option value="nome">Nome:</option>
    <option value="nome">OAB:</option>
</optgroup>

<optgroup label="Compromissos" value="compromissos">
    <option value="nome">Data:</option>
</optgroup>

</select>
            <input type="text" class="form-control" id="search" name="search" style="width: 94%; padding-left: 0%; float: left; position: relative; left: 8%; padding: 1% 1% 1% 15%" placeholder="Digite sua busca aqui...">
            <button id="pes" type="button" class="btn" style="background: rgba(255,255,255,0.6); position: relative; left: 0.7%; padding: 0.2%; margin-top: 0.5%">
              <img src="img/search.png">
            </button>
          </fieldset>
        </div>
        <div id="painel_link" style="width: 113%; height: 530px; position: relative; overflow:hidden; left: -14px"> </div>
      </div>
    </div>
  </nav>
</body>

</html>