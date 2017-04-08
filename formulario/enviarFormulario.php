<?php
/*
 * Incluir librerías necesarias
 */
include_once('class.phpmailer.php');
include_once('class.smtp.php');

/*
 * Recibir todas las variables del formulario
 */
$nombre  = $_POST['nombre'];
$email   = $_POST['email'];
$mensaje = $_POST['mensaje'];


/*
 * Preparando cosas basicas de la libreria
 * Configurando servidor SMTP
 * Configurando correo desde el cual enviaremos
 * Configurando contraseña del correo desde el cual enviaremos
 */

try {
$mail             = new PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl";
$mail->Host       = "mediomaratondepuebla.com";
$mail->Port       = 465;
$mail->Username   = "admin@mediomaratondepuebla.com";
$mail->Password   = "Victor123#";
$mail->CharSet    = 'UTF-8';


/*
 * Datos del que envía y del destinatario
 * El correo que envia es el que colocaste arriba
 *
 * Podemos colocar varios destinatarios
 */
$mail->From     = "admin@mediomaratondepuebla.com";
$mail->FromName = "Formulario de Ejemplo";
$mail->AddAddress("ismaharo18@gmail.com");
$mail->AddAddress("blackmaxxgdl18@hotmail.com");

/*
 * Construimos cuerpo del correo
 */
$mail->Subject = "Ejemplo de correo";

$template = '
            <html>
                <head>
                  <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
                </head>
                <body>
                    <table style="width: 100%;" border="1">
                        <tbody>
                            <tr>
                                <th>&nbsp;Concepto</th>
                                <th>&nbsp;Descripci&oacute;n</th>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td>'.$nombre.'</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>'.$email.'</td>
                            </tr>
                            <tr>
                                <td>Mensaje</td>
                                <td>'.$mensaje.'</td>
                            </tr>

                        </tbody>
                    </table>
                </body>
            </html>';

/*
 * Añadimos el cuerpo al email
 */
$mail->MsgHTML($template);


/*
 * Enviamos el email
 */
$mail->Send();

echo'<script type="text/javascript">
        alert("Enviado Correctamente");
        window.location="/"
     </script>';

} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

?>
