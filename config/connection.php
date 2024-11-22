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
        

        $checkTable = "SHOW TABLES LIKE 'users'";
        $result = $conn -> query($checkTable);
        
        if($result -> rowCount()==0)
        {
            $createTable = '
                CREATE TABLE users(
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL,
                    password VARCHAR(150) NOT NULL
                )
            ';
            $conn -> exec($createTable);
            echo 'Tabla de usuarios creado exitosamente';

            // Encriptar contraseña

            $hashPass = password_hash('admin', PASSWORD_DEFAULT);
            $insertDataToTable = "INSERT INTO users(username, password)VALUES('admin', :password)";
            $prepareData = $conn -> prepare($insertDataToTable);
            $prepareData -> bindParam(':password', $hashPass);
            $prepareData -> execute();
            echo 'El admin se ha creado exitosamente';
        } else {

            // si la tabla existe
            
            // Verficar la existencia del usuario admin
            $checkUserAdmin = "SELECT * FROM users WHERE username = 'admin'";
            $checkResult = $conn->query($checkUserAdmin);

            if($checkResult->rowCount()==0)
            {
                $hashPass = password_hash('admin', PASSWORD_DEFAULT);
                $insertDataToTable = "INSERT INTO users(username, password)VALUES('admin', :password)";
                $prepareData = $conn -> prepare($insertDataToTable);
                $prepareData -> bindParam(':password', $hashPass);
                $prepareData -> execute();
                echo 'El admin se ha creado exitosamente';
            }
        }
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
