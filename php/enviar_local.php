<?php
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];
$contenido="Nombre: " .$nombre. "<br>Correo: " .$correo."<br>Telefono: " .$telefono. ".<br>Mensaje: " .$mensaje;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mailer/Exception.php';
require 'mailer/PHPMailer.php';
require 'mailer/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'emiliomonjaraz477@gmail.com';                     //SMTP username
    $mail->Password   = 'emiliosote135456';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('emiliomonjaraz477@gmail.com', 'emilio');
    $mail->addAddress('emiliomonjaraz906@gmail.com');     //Add a recipient
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'mensaje de prueba';
    $mail->Body    =  $contenido;
    '<script>
    alert("El mensaje se ha enviado.");
    window.history.go(-1);
    </script>';

    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "El mensaje no se pudo enviar. Error de envio: {$mail->ErrorInfo}";
}