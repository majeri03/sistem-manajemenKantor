<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->isSMTP();  
$mail->Host = 'mail.raghavinfocom.com';  
$mail->SMTPAuth = true;                              
$mail->Username   = 'no_reply@raghavinfocom.com';
$mail->Password   = 'zo?n6BDVGtdo';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';        
$mail->isHTML(true);
$mail->setFrom('no_reply@raghavinfocom.com','Drkalan Front');
$mail->addAddress('as.upturnit@gmail.com');
$mail->Subject ='Your Appointment Approved.';
$mail->Body    =  'hii';
$mail->send();
?>