import loadTemplate from './router.js'

import { reqAjax } from './petitionAjax.js'

$(document).ready(function()
  {
    // logear

    $('#loginForm').on('submit', function(e)
      {
        e.preventDefault()
        console.log('Formulario enviado (prevención funcionando)');

        let username = $('#username').val()
        let password = $('#password').val()

        let data ={
          "username":username, 
          "password":password
        }

        console.log('data lista para enviar mediante ajax',data)
    
        reqAjax(
          '/login.php',
          'POST',
          data,
          'json',
          function(response)
          {
            console.log(response)

            // aqui debe llamar a la funcion loadTemplate

            if(response.error) {
              console.error('Error al intentar logearse:', response.error);
              $('#loginError').text(response.error).show();
          } else {
              console.log('Cargando template con ruta:', response.ruta, 'y archivo:', response.archivo);
              loadTemplate(response.ruta, response.archivo);
          }
          }
        )
      }
    )


    // navegar a registro
    $('.register').click(function()
      {
        let route = $(this).attr('route')
        let file = $(this).attr('file')
        loadTemplate(route, file)
      }
    )
  }
)