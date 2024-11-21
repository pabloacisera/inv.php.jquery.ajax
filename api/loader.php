<?php
if (isset($_POST['data-view'])) {
    $view = $_POST['data-view'];  // Obtener el nombre de la vista solicitada
    
    // Usar una ruta absoluta para obtener la vista
    $file_path = __DIR__ . '/../pages/' . $view . '.html';  // Ruta absoluta

    // Verificar si el archivo de vista existe
    if (file_exists($file_path)) {
        // Cargar el contenido del archivo
        $content = file_get_contents($file_path);

        // Devolver el contenido de la vista y la nueva URL como JSON
        echo json_encode([
            'template' => $content,  // Contenido HTML de la vista
            'url' => '/pages/' . $view . '.html'  // URL correcta
        ]);
        
    } else {
        // Si la vista no existe, devolver un mensaje de error
        echo json_encode([
            'template' => '<div><p>No existe vista relacionada</p></div>',
            'url' => '/'  // No actualizamos la URL si no se encuentra la vista
        ]);
    }
} else {
    // Si no se recibe un parámetro 'data-view', retornar un mensaje de error
    echo json_encode([
        'template' => '<div><p>No se ha recibido ruta para parsear</p></div>',
        'url' => '/'  // No actualizamos la URL si no se recibe la ruta
    ]);
}
?>
