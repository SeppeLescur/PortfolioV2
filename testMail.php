<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2; // Set to 0 to disable debugging output
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'seppelescur.work@gmail.com';
$mail->Password = 'bduukidlggvffxgk';
$mail->setFrom('seppelescur.work@gmail.com', 'Your Name');
$mail->addAddress('seppelescur.work@gmail.com', 'Recipient Name');
$mail->Subject = 'Test Email';
$mail->Body = 'This is a test email from PHPMailer.';
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}