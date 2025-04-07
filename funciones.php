<?php
// Función para validar nombre (solo letras, espacios y tildes)
function validarNombre($nombre) {
    $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/";
    return preg_match($patron, $nombre);
}

// Función para validar correo electrónico (formato estándar)
function validarCorreo($correo) {
    $patron = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    return preg_match($patron, $correo);
}

// Función para validar teléfono (10 dígitos con opción de guiones)
function validarTelefono($telefono) {
    $patron = "/^(\d{10}|\d{3}-\d{3}-\d{4})$/";
    return preg_match($patron, $telefono);
}

// Función para validar dirección (letras, números, espacios, puntos y comas)
function validarDireccion($direccion) {
    $patron = "/^[a-zA-Z0-9\s.,]+$/";
    return preg_match($patron, $direccion);
}

// Función para validar código postal (exactamente 5 dígitos numéricos)
function validarCodigoPostal($codigoPostal) {
    $patron = "/^\d{5}$/";
    return preg_match($patron, $codigoPostal);
}
?>