<?php
$DB_CONECT = mysqli_connect("localhost", "root", "") or die(mysqli_error("erro"));
$DB = mysqli_select_db($DB_CONECT, "sisjur") or die("erro na conexao");
$sql = mysqli_query($DB_CONECT, "SELECT arquivamento, numero,cliente,idsubcliente,advogado,contrario,tipoacao,prognostico,obs FROM processos");
foreach ($sql as $key) {
echo 
"<script type='text/javascript'>".
" db.transaction(function (transaction) {transaction.executeSql('INSERT INTO processos_test(arquivamento,numero,cliente,subclientes,audiencista,contrarios,tipo,arquivos,obs)".
" VALUES(?,?,?,?,?,?,?,?,?);', [".$key['arquivamento'].",".$key['numero'].",".$key['cliente'].",".$key['idsubcliente'].",".$key['advogado'].",".$key['contrario'].",".$key['tipoacao'].",".$key['prognostico'].",".$key['obs']."])})"."</script>";
}

?>