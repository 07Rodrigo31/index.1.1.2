<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    // Dirección a la que se enviará el correo
    $destinatario = "brayan.rcz.2023@gmail.com";
    $asunto = "Nuevo mensaje de contacto";

    // Construir el contenido del correo
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Correo: $email\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Encabezados del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $contenido, $headers)) {
        echo "<script>alert('Mensaje enviado correctamente.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Hubo un error al enviar el mensaje.'); window.history.back();</script>";
    }
} else {
    echo "Acceso no autorizado.";
}
?>