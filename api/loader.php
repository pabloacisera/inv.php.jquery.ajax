<?php
    if(isset($_POST['data-view']))
    {
        $file = $_POST['data-view'];
        $file_path = '../pages/'.$file.'.html';

        if(file_exists($file_path))
        {
            echo file_get_contents($file_path);
        } else {
            echo '<div><p>No existe vista relacionada</p></div>';
        }
    } else {
        echo '<div><p>No se ha recibido ruta para parsear</p></div>';
    }