<?php
    include("../config/connection.php");

    try
    {
        $task = "SHOW TABLES LIKE 'productos'";
    $query = $connection->prepare($task);

    $query -> execute();

    if($query -> rowCount()>0)
    {
        $infoProducts = "DESCRIBE productos";
        $queryProducts = $connection->prepare($infoProducts);
        $queryProducts->execute();

        //obtener los nombres de las columnas
        $columns = [];

        while($row = $queryProducts->fetch(PDO::FETCH_ASSOC))
        {
            $columns[] = $row['Field'];
        }

        echo json_encode([
            "status"=> "success",
            "message"=>"La tabla de productos existe",
            "columns"=>$columns
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "La tabla 'productos' no existe."
        ]);
    }
    } catch(PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Error en la consulta: " . $e->getMessage()
        ]);
    }
