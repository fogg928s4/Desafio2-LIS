<?php
include ('usuario.php');
$name = $_POST["nombre"];
$email = $_POST["correo"];
$tel = $_POST["tel"];
$dir = $_POST["direccion"];
$zip = $_POST["postal"];
$usuario = new Usuario($name, $email, $tel, $dir, $zip);
$usuario->limpiarDatos();
$usuario->guardarEnBD();
?>


