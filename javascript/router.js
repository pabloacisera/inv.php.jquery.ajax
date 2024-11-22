function loadTemplate(route, file) {
    $.ajax({
        url: "/inventify/api/launcher.php",
        type: "POST", 
        data: {
            "route": route,
            "file": file
        },
        success: function (r) {
            let template = JSON.parse(r);
            console.log('respuesta parseada')
            // Asegúrate de que la respuesta tiene los campos esperados
            if (template.archivo) {
                $('.template').html(template.archivo);  // Insertar el contenido HTML en el contenedor de la plantilla
            } else {
                console.error('No se encontró el archivo HTML en la respuesta.');
            }

            // Actualizar la URL si la propiedad 'ruta' está presente
            if (template.ruta) {
                let newUrl = template.ruta;

                if (newUrl.indexOf('.html') === -1) {
                    newUrl = newUrl + ".html";
                }

                if (newUrl.indexOf('/inventify/') === -1) {
                    newUrl = '/inventify/' + newUrl;
                }

                history.pushState(null, '', newUrl);
            }

            // Cargar y ejecutar el JS correspondiente
            if (template.js) {
                let script = document.createElement('script');
                script.type = 'text/javascript';
                script.text = template.js;
                document.body.appendChild(script);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error en la solicitud AJAX:', status, error);  // Agregado para manejar errores
        }
    });
}

export default loadTemplate;