<?php
if (isset($_POST['route']) && isset($_POST['file'])) {
    $route = $_POST['route'];
    $file = $_POST['file'];

    // Concatenamos la ruta completa del archivo HTML
    $object = __DIR__ . '/../' . $route . '/' . $file . '.html';

    // Verificamos si el archivo HTML existe
    if (is_file($object) && pathinfo($object, PATHINFO_EXTENSION) === 'html') {
        // Leemos el contenido del archivo HTML
        $fileContent = file_get_contents($object);

        // Concatenamos la ruta completa del archivo JS
        $js = '/inventify/javascript/' . $file . '.js';

        // Devolvemos el contenido HTML y JS en formato JSON
        echo json_encode([
            "ruta" => $route . '/' . $file,  // Asegúrate de devolver la ruta completa
            "archivo" => $fileContent,      // Contenido HTML
            "js" => $js                // Contenido JS
        ], JSON_UNESCAPED_UNICODE);

    } else {
        // En caso de error, enviar una respuesta JSON con un mensaje de error
        echo json_encode([
            "error" => "La ruta, nombre o extensión del archivo no existe en la aplicación."
        ], JSON_UNESCAPED_UNICODE);
    }
} else {
    // En caso de falta de parámetros, enviar un mensaje de error
    echo json_encode([
        "error" => "El parámetro de ruta o archivo no existe en la aplicación."
    ], JSON_UNESCAPED_UNICODE);
}
?>

