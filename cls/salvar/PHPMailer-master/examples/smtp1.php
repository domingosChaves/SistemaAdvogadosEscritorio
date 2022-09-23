<?php
date_default_timezone_set('Etc/UTC');
require '../PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = "192.168.56.101";
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->Username = "domingos20";
$mail->Password = "domingos20";
$mail->setFrom('domingos20@teste.br', 'Domingos');
$mail->addAddress('domingos20@teste.br', 'Domingos20');
$mail->Subject = 'PHPMailer SMTP test';
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>