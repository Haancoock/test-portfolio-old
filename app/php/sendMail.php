<?php

function sendEmail($name, $email, $sub, $body){
require '../components/PHPMailer/src/PHPMailer.php';
require '../components/PHPMailer/src/SMTP.php';
require '../components/PHPMailer/src/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer;                           // Passing `true` enables exceptions
	try {

   	 //Recipients
    	$mail->setFrom($name, $email);
    	$mail->addAddress('hanck@mail.com', 'Ali');     // Add a recipient
    	//Content
    	$mail->isHTML(true);                                  // Set email format to HTML
    	$mail->Subject = $sub;
    	$mail->Body    = $body;
    	$mail->AltBody = $body;

    	$mail->send();
    		return($body);
		} catch (Exception $e) {
    		return('Message could not be sent. Mailer Error: ');
			}
	}