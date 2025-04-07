<?php
// Función para corregir nombre (reemplazar doble espacio por un solo espacio)
function corregirNombre($nombre) {
    // Reemplaza los doble espacios por un solo espacio
    return preg_replace('/\s+/', ' ', $nombre);
}

// Función para corregir correo (convertir a minúsculas)
function corregirCorreo($correo) {
    // Convierte el correo a minúsculas
    return strtolower($correo);

}

// Función para corregir dirección (eliminar caracteres no válidos)
function corregirDireccion($direccion) {
    // Elimina caracteres que no sean letras, números, espacios, comas o puntos
    return preg_replace('/[^a-zA-Z0-9\s.,]/', '', $direccion);
}

