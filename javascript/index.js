$(document).ready(function() {
    console.log("JS cargado");

    // Delegar el evento change para los elementos select renderizados dinámicamente
    $(document).on('change', 'select', function() {
        // Obtener los atributos correspondientes
        let folder = $(this).attr('attr-data');  // Obtener el valor de attr-data
        let vista = $(this).find(':selected').attr('attr-value');  // Obtener el valor de attr-value del option seleccionado

        console.log('Atributo data (folder):', folder);
        console.log('Atributo value (vista):', vista);

        // Realizar la solicitud AJAX enviando ambos valores
        $.ajax({
            url: "/inventify/api/launcher.php",
            type: "POST",
            data: { 
                'attr-data': folder,  // Enviar el valor de attr-data
                'attr-value': vista    // Enviar el valor de attr-value
            },
            success: function(res) {
                console.log('Respuesta obtenida de PHP:', res);

                try {
                    const response = JSON.parse(res)
                    if(response.route && response.template){
                        const newUrl = response.route
                        windows.history.pushState(null, null, newUrl)

                        $('.template').html(response.template)
                    } else {
                        console.error('error en la respuesta del servidor, datos incompletos')
                    }
                } catch (error) {
                    console.error('error al parsear la respuesta')
                }
            },
            error: function(xhr, status, error) {
                console.log('Error en la solicitud AJAX:', status, error);
            }
        });
    });
});

