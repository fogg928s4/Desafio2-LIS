<?php
class Usuario
{
    var $nombre;
    var $correo;
    var $telefono; 
    var $direccion; 
    var $codigoPostal; 
    

    function __construct($name, $email, $tel, $dir, $zip)
    {
        $this->nombre = $name;
        $this->correo = $email;
        $this->telefono = $tel;
        $this->direccion = $dir;
        $this->codigoPostal = $zip;
    } 
    
     function validarNombre($nombre) {
        $patron = "/^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/";
        return preg_match($patron, $nombre); //Retorna falso o verdadero
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
     function corregirDireccion($direccion) 
    {
        // Elimina caracteres que no sean letras, números, espacios, comas o puntos
        return preg_replace('/[^a-zA-Z0-9\s.,]/', '', $direccion);
    }
    
     function validarCampos()
     {
        return ($this->validarNombre($this->nombre) && $this->validarCorreo($this->correo) && $this->validarTelefono($this->telefono) && $this->validarDireccion($this->direccion) && $this->validarCodigoPostal($this->codigoPostal));
    }

     function limpiarDatos()
    {
        $this->correo = $this->corregirCorreo($this->correo);
        $this->direccion = $this->corregirDireccion($this->direccion);
        $this->nombre = $this->corregirNombre($this->nombre);
    }

    function guardarEnBD() 
    {
        $conection = new PDO('mysql:host=localhost:3307;dbname=validacion_php', 'root', '');
        $stmt = $conection->prepare("INSERT INTO usuarios (nombre, correo, telefono, direccion, cod_postal) VALUES (:nombre, :correo, :tel, :dir, :postal)");
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':correo', $this->correo);
        $stmt->bindParam(':tel', $this->telefono);
        $stmt->bindParam(':dir', $this->direccion);
        $stmt->bindParam(':postal', $this->codigoPostal);

        if($stmt->execute()) echo 'Usuario registrado correctamente :D';
        
    }
}
?>