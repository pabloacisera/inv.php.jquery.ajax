<?php
// Incluir la conexión a la base de datos
include "../config/connection.php";

/**
 * Verifica si el nombre de usuario y la contraseña son correctos.
 * 
 * @param string $username El nombre de usuario.
 * @param string $password La contraseña del usuario.
 * @return array|bool Devuelve el usuario si el login es exitoso o un array con el error.
 */
function queryLogin($username, $password)
{
    global $conn; // Usamos la conexión global de PDO
    
    try {
        // Consulta para verificar si el usuario existe
        $queryCheckUser = "SELECT * FROM users WHERE username = :username";
        $data = $conn->prepare($queryCheckUser);
        $data->bindParam(':username', $username);
        $data->execute();

        // Si el usuario existe
        if ($data->rowCount() > 0) {
            $user = $data->fetch(PDO::FETCH_ASSOC);
            
            // Verificar si la contraseña es correcta
            if (password_verify($password, $user['password'])) {
                // Login exitoso, retornar los datos del usuario
                return $user;
            } else {
                // Contraseña incorrecta
                return ['error' => 'Contraseña incorrecta'];
            }
        } else {
            // Usuario no encontrado
            return ['error' => 'Usuario no encontrado'];
        }
    } catch (PDOException $e) {
        // En caso de error en la base de datos
        return ['error' => 'Error de conexión: ' . $e->getMessage()];
    }
}
?>
