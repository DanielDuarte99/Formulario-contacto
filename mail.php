<?php

require("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function senMail($subject, $body, $email, $name, $html = false) {

    //Configuración inicial de nuestro servidor de correos.
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'testing.dev1959@gmail.com';
    $phpmailer->Password = 'adohrtcjweppdcgo';

    //Añadiendo destinatarios.
    // $phpmailer->setFrom('juliotics@gmail.com', 'Daniel');
    // $phpmailer->addAddress($email, $name);

    $phpmailer->setFrom($email, $name);
    $phpmailer->addAddress('testing.dev1959@gmail.com', 'Test');

    //Definiendo el contenido del e-mail.
    $phpmailer->isHTML($html);                                  
    //Set email format to HTML
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $body;

    //Mandar correo.
    $phpmailer->send();

}

?>