<?php
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['telefono'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$telefono = strip_tags(htmlspecialchars($_POST['telefono']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "ps.josefinagarcia@gmail.com"; // Change this email to your //
$subject = "$telefono:  $name";
$body = "$name Necesita contactarse contigo, por favor responder a la brevedad.\n\n"."Detalle:\n\nNombre: $name\n\n\nTelefóno: $telefono\n\nCorreo: $email\n\nMensaje: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
