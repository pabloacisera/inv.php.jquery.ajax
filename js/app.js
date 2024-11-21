
$(document).ready(function () {
    console.log('script app cargado');

    $('[data-view]').click(function(){
        let view = $(this).attr('data-view');  // Usar 'this' para obtener el valor correcto
        console.log('vista para consultar: ', view);
        try {
            $.ajax({
                url:"/inventify/api/loader.php",
                type:"POST",
                data:{'data-view':view},
                success: function(r){
                    console.log('respuesta de php: ', r);
                    let template = r.template;  // Obtener el contenido de la propiedad 'template'
                    $(".primary-container").html(template);  // Insertarlo en el contenedor
                }
            })
        } catch (error) {
            console.error("No se puede obtener html")
        }
    })





});