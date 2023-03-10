<?php

use Utils\Environment;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Environment::load(__DIR__.'/../');

//Create an instance; passing `true` enables exceptions


function sendMail($name, $email, $subject, $message){
  
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    //Set the SMTP server to send through
    // $mail->Host       = getenv('MAIL_SMTP');                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'marlon.pauloo@gmail.com';                //SMTP username
    // $mail->Username   = getenv('MAIL_USERNAME');                //SMTP username
    $mail->Password   = 'stqzgmhoznlytpmp';                //SMTP password
    // $mail->Password   = getenv('MAIL_PASSWORD');                //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->setLanguage('br');


    //Recipients
    $mail->setFrom('marlon.pauloo@gmail.com', 'Marlon Developer');
    $mail->addAddress($email, $name);     //Add a recipient
    // $mail->addAddress('marlon.paulo.silva@outlook.com', 'Marlon Developer E-mail');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$email ($subject)";
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    return true;
    exit();
} catch (Exception $e) {
    return false;
    exit();
    // return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}