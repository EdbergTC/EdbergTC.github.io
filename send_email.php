<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Crear el contenido del correo
    $to = "lenin_92_2008@hotmail.com";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $email_subject = "Nuevo mensaje de contacto: $subject";
    $email_body = "Nombre: $name\nCorreo: $email\nTeléfono: $phone\n\nMensaje:\n$message";

    // Enviar el correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Mensaje enviado exitosamente.";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtelo de nuevo.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>