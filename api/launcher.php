<?php
    // Verificar que los datos han sido enviados por POST
    if (isset($_POST['attr-data']) && isset($_POST['attr-value'])) {
        $folder = $_POST['attr-data'];  // Obtener el valor de 'attr-data'
        $file = $_POST['attr-value'];   // Obtener el valor de 'attr-value'

        // Crear la ruta del archivo
        $filePath = '../pages/' . $folder . '/' . $file . '.html';

        // Verificar si el archivo existe
        if (file_exists($filePath)) {

            // Capturar el archivo en una variante
            $template = file_get_contents($filePath);
            $template = htmlspecialchars($template);

            // Si existe, devolver la ruta del archivo
            echo json_encode(['route' => $filePath, 'template' => $template]);
        } else {
            // Si el archivo no existe, devolver un error
            echo json_encode(['error' => 'El archivo no existe.']);
        }
    } else {
        echo json_encode(['error' => 'Datos incompletos.']);
    }
?>
