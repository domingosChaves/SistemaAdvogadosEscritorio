<html>
<head>
<title>Sisjur</title>
<meta http-equiv="Content-Type" content="text/html">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="img/rr.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funcoes.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#matricula").focus();
  $('#ver_senha').on('click', function(){
    var passwordField = $('#senha');
    var passwordFieldType = passwordField.attr('type');
    if(passwordFieldType == 'password'){
        passwordField.attr('type', 'text');
        $(this).val('Hide');
    } else {
        passwordField.attr('type', 'password');
        $(this).val('Show');
    }
  });
  })
</script>
</head>
<body style="background: rgba(0,0,0,0.75);">
<center>
<div style="width: 40%; position: relative; top: 70px; border: solid 0.2px rgba(255,255,255,0.1); padding: 1%">

<img src="img/logo.png" style="padding: 10%" />
<div name="formulario" id="formulario" style="width: 100%" class="form-group">


  <input type="text" name="matricula" id="matricula" maxlength="30" class="form-control" placeholder="Digite seu nome de usuário" required="on"  aria-describedby="basic-addon1" style="font-size: 16px">
<br>


  <input type="password" name="senha" id="senha" maxlength="30" class="form-control" placeholder="Digite sua senha" required="on" aria-label="Amount (to the nearest dollar)" style="font-size: 16px">
<br>
<!--SUCESSO-->
<div class="alert alert-success" id="LoginAut">
  <strong>Login autorizado!</strong><br> Você sera redirecionado!
</div>
<!--ERRO LOGIN-->
<div class="alert alert-warning" id="LoginInc">
  <strong>Ops, Login / Senha incorreto(s)!</strong><br> Digite novamente!
</div>
<!--MAIS DE 3 TENTATIVAS-->
<div class="alert alert-danger" id="LoginBlo">
  <strong>Login Bloqueado!</strong> Você fez tres tentativas incorretas de login.<br>
  <a href="">Acesse aqui para liberação do seu acesso acesso</a>
</div>
<!--ACESSO BLOQUEADO-->
<div class="alert alert-danger" id="LoginNo">
  <strong>Login não autorizado!</strong> Login bloqueado por motivos internos.<br>
  <a href="">Acesse aqui para informar o administrador do portal!</a>
</div>
 <button name="Login" id="Login" class="btn btn-success" value="Entrar" style="width: 50%"><b>Entrar </b><img src="img/cadeado1.png"></button><br><br><a href="../index.php" style="color: rgba(255,255,255,1); padding: 1%">Sisjur Antigo</a>


</div>

</center>

</body>

</html>