import loadTemplate from './router.js';  // Asegúrate de que la ruta esté bien especificada
$(document).ready(function()
  {
    $('.register').click(function()
      {
        let route = $(this).attr('route')
        let file = $(this).attr('file')
        loadTemplate(route, file)
      }
    )
  }
)