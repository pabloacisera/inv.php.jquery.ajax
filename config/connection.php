<?php
try {
    // Configuración de conexión a MySQL
    $host = '127.0.0.1';          // Servidor de MySQL (puede ser localhost o la IP del servidor)
    $dbname = 'inventario';       // Nombre de tu base de datos MySQL
    $username = 'root';           // Tu nombre de usuario de MySQL
    $password = 'nueva_contraseña';          // Tu contraseña de MySQL
    $port = 3306;                 // Puerto de MySQL (por defecto 3306)

    // Crear la conexión a MySQL usando PDO, incluyendo el puerto en el DSN
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";  // DSN de MySQL con puerto
    $connection = new PDO($dsn, $username, $password);

    // Establecer el modo de error de PDO para excepciones
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connection successfully established!";
} catch (PDOException $e) {
    // Mostrar el mensaje de error en caso de que falle la conexión
    echo "Connection error: " . $e->getMessage();
}
?>
