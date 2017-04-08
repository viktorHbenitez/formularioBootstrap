<?php
/*
 * PROCURA TENER UN "CODING STYLE"
 * LIMPIEZA EN TU CODIGO
 * COMENTA TU CODIGO
 *
 * NO TE RECOMIENDO UTILIZAR LA FUNCION "MAIL"
 * NATIVA DE PHP PORQUE ES MUY LIMITADA Y NO SIRVE
 * MUY BIEN
 * MEJOR OCUPEMOS UNA LIBRERIA GRATITUA
 * LLAMADA "PHP MAILER"
 *
 * LINK: https://github.com/PHPMailer/PHPMailer
 */

 /*
  * Preparando variables de envío
  */
$nombre  = $_POST['nombre'];
$email   = $_POST['email'];
$mensaje = $_POST['mensaje'];


/*
 * Preparando encabezado del email
 */
$header  = 'From: ' . $email . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .=  "Mime-Version: 1.0  \r\n";
$header .= "Content-Type: text/plain";

/*
 * Preparando cuerpo del email
 */
$comentario  = "Este mensaje fue enviado por: " . $nombre . "  \r\n";
$comentario .= "Su e-mail es: " . $email  . " \r\n";
$comentario .= "Su mensaje es: " . $mensaje . " \r\n";

/*
 * Destinatarios
 */
$para   = "ismaharo18@gmail.com";
$asunto = "Contacto desde pagina web";

mail($para, $asunto, utf8_encode($comentario), $header);

echo json_encode(array(
	'Mensaje' => sprintf('Se recibió el correo de %s', $nombre)
));

?>
