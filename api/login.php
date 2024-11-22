<?php
    include "../query/queryLogin.php";

    if(isset($_POST['username']) && isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // el metodo de conexion es $conn

        $response = queryLogin($username, $password);

        if(isset($response['error']))
        {
            echo $response['error'];
        } else {
            setcookie('user', 'active', time() + 1*24*60*60);
            
            echo json_encode(
                [
                    "ruta" => "pages/",
                    "archivo" => "home"
                ]
            );
        }
    } else {
        echo json_encode([
            "error" => "Por favor ingresa tu nombre de usuario y contraseña."
        ]);
    }