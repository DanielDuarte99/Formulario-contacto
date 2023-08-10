<?php

require("mail.php");

function validate($name, $email, $subject, $message, $form) {
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

$status = "";

if ( isset($_POST["form"]) ) {

    if( validate(...$_POST) ) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $body = "$name con el correo: $email te envia el siguiente mensaje: <br><br> $message";

        // Mandar el correo del formulario.
        senMail($subject, $body, $email, $name, true);

        $status = "success";

    }
    else {

        $status = "danger";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contacto</title>
</head>
<body>

    <form action="./" method="POST">

        <h1>¡Contáctanos!</h1>

        <div class="input-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="input-group">
            <label for="subject">Asunto:</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            <label for="message">Mensaje:</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <div class="button-container">
            <button name="form" type="submit">Enviar</button>
        </div>

            <?php if($status == "danger"):  ?>
        <div class="alert danger">
            <span>Surgió un problema</span>
        </div>
        <?php endif; ?>

        <?php if($status == "success"):  ?>
        <div class="alert success">
            <span>¡Mensaje enviado con éxito!</span>
        </div>
        <?php endif; ?>

        <div class="contact-info">

            <div class="info">
                <span><i class="fa-solid fa-location-dot fa-bounce" style="color: #000000;"></i> Ignacio Allende 21, Ignacio Allende. Ecatepec de Morelos, Méx.<br></span>
            </div>

            <div class="info">
                <span><i class="fa-solid fa-phone fa-shake" style="color: #000000;"></i> +52 55 60 04 85 29</span>
            </div>

        </div>

    </form>

    <script src="https://kit.fontawesome.com/1500ed68b7.js" crossorigin="anonymous"></script>

</body>
</html>