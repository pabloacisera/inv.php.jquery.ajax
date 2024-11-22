<?php
    // Parámetros de conexión a la base de datos
    $host = '127.0.0.1';
    $username = 'root';
    $password = 'kayas';
    $database = 'inventario';

    try {
        // Crear una nueva conexión PDO
        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        
        // Configurar el modo de error de PDO a excepción
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Si la conexión es exitosa, muestra un mensaje (opcional)
        //echo 'Conexión exitosa';
    }
    catch (PDOException $e) {
        // Si ocurre un error, lo capturamos y mostramos un mensaje
        die("Conexión fallida: " . $e->getMessage());
    }

    // No es necesario cerrar la conexión explícitamente con PDO,
    // ya que PHP lo hace automáticamente cuando el script termina.
?>
