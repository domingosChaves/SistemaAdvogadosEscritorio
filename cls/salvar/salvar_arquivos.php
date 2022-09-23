<?php
/**
* CLASSE PARA TRATAR ARQUIVOS ENVIADOS DOS FORMULARIO PROCESSOS
*/
class Arquivos
{

public function Start()
{
$this->post();
}

private function post()
{
$cli = $_POST["clientes"];
$id = $_POST['id_procorigem'];
$pro = $_POST["arquivamento"];
$num_exp = explode("/", $_POST['numero']);
$num_cont  = count($num_exp);
if ($num_cont = 0) {
$num = $_POST['numero'];
} else {
for ($i=0; $i <count($num_exp); $i++) { 
@$num .= $num_exp[$i];
}
}
$idCli = $_POST['id_nome'];

$this->pastas($id,$pro,$num,$idCli,$cli);
}


private function pastas($id, $proc,$num,$idCli,$cli)
{

$path = "../../Arquivos/";
if (is_dir($path)) {} else {mkdir($path, 0755);}
if (is_dir($path.$id)) {} else {mkdir($path.$id, 0755);}
if (is_dir($path.$id."/".$proc)) {} else {mkdir($path.$id."/".$proc, 0755);}
if (is_dir($path.$id."/".$proc."/".$num)) {} else {mkdir($path.$id."/".$proc."/".$num, 0755);}
if (is_dir($path.$id."/".$proc."/".$num."/".$idCli)) {} else {mkdir($path.$id."/".$proc."/".$num."/".$idCli, 0755);}

$move = $path.$id."/".$proc."/".$num."/".$idCli."/";
$this->move($move);
}

public function move($move)
{
@session_start();
include_once('../../db/conn2.php');
for ($i=0; $i < count($_FILES["arquivo"]["name"]) ; $i++) {
$file = $_FILES["arquivo"]["name"][$i];
$tipo = $_FILES["arquivo"]["type"][$i];
$tmp  = $_FILES["arquivo"]["tmp_name"][$i];
$erro = $_FILES["arquivo"]["error"][$i];
$size = $_FILES["arquivo"]["size"][$i];
$usuario = $_SESSION['matricula'];
$processo = $_POST['id_procorigem'];
$caminho  = $move."/".$file;
$arquivo[] = $caminho;
move_uploaded_file($tmp,$caminho); 
//copy($tmp, $caminho);
$sql = "INSERT INTO arquivos (id,nome,tamanho,dataupload,horaupload,usuario,processo)VALUES(NULL,'{$file}','{$size}',now(),now(),'{$usuario}','{$processo}')";
mysqli_query($DB_CONECT, $sql) or die(mysqli_error($DB_CONECT));
}
$this->Email($arquivo);
}

public function Email($caminho)
{
require '../../db/conn2.php';
$email = array();
$sql = "SELECT clientes.email, clientes.anexo FROM sisjur.clientes WHERE id = $_POST[id_nome] AND anexo ='V'";
$query = mysqli_query($DB_CONECT, $sql) or die (mysqli_error($DB_CONECT));
$resul = mysqli_fetch_assoc($query);
$cliente = explode(";", $resul['email']);
for ($a=0; $a < count($cliente) ; $a++) { 
if ($cliente[$a]) {} else {
$emails[] = strtolower($cliente[$a]);
}
}

for ($e=0; $e < count($_POST['subclientes']); $e++) { 
$subcli = $_POST['subclientes'][$e];
$sqls = "SELECT DISTINCT subcliente.email, subcliente.anexo FROM sisjur.subcliente WHERE idsubcliente = $subcli AND anexo ='V' ";
$querys = mysqli_query($DB_CONECT, $sqls) or die (mysqli_error($DB_CONECT));
$resuls = mysqli_fetch_assoc($querys);
$subclientes = explode(";", $resuls['email']);
for ($i=0; $i < count($subclientes); $i++) {
if ($subclientes[$i] == "") {} else {
$emails[] = strtolower($subclientes[$i]);
}
}
}

$email = array_unique($emails);

require '../PHPMailer-master/PHPMailerAutoload.php';
date_default_timezone_set('Etc/UTC');
for ($em=0; $em < count($email); $em++) { 
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "smtp";
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->Username = "domingos20";
$mail->Password = "domingos20";
$mail->setFrom('domingos20@teste.br', 'Domingos');
$mail->addAddress('domingos20@teste.br', 'Domingos20');
$mail->Subject = 'Teste de envio '.$em.' do modulo de envio de arquivos';
$mail->msgHTML('Arquivos enviados com sucesso!');
//Attach multiple files one by one
}
for ($i=0; $i < count($caminho); $i++) { 
$mail->addAttachment($caminho[$i]);//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    # code...
}
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
    echo '<div class="alert alert-danger" style="width: 100%">Os arquivos não foram enviados com sucesso!</div>';
} else {
    echo '<div class="alert alert-success" style="width: 100%">Arquivos enviados com sucesso!</div>';
}}
} //FIM DA CLASSE

$arq = new Arquivos();
$arq->Start();


?>