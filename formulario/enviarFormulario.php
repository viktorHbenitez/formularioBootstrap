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
$mail             = new PHPMailer();
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "ssl";
$mail->Host       = "servidorsmtpDelHosting";
$mail->Port       = 465;
$mail->Username   = "correo@envia.com";
$mail->Password   = "passwordDelCorreo";
$mail->CharSet    = 'UTF-8';
$mail->IsSMTP();


/*
 * Datos del que envía y del destinatario
 * El correo que envia es el que colocaste arriba
 *
 * Podemos colocar varios destinatarios
 */
$mail->From     = "correo@envia.com";
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
if($mail->Send())
{
    echo'<script type="text/javascript">
            alert("Enviado Correctamente");
            window.location="http://tejasdebarrolapusa.com/"
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
            window.location="http://tejasdebarrolapusa.com/"
         </script>';
}

?>
