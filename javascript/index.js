import loadTemplate from './router.js';  // Asegúrate de que la ruta esté bien especificada
import getCookie from './getCookie.js';  // Y lo mismo para getCookie.js


$(document).ready(function () {
    // Obtener el valor de la cookie 'db'
    let sessionStatus = getCookie('user');  // Revisamos si la cookie 'db' existe

    if (sessionStatus === "active") {
        // Si la cookie 'db' está activa
        console.log('Usuario registrado');
    } else {
        // Si la cookie no existe o no está activa
        console.log('No se ha registrado usuario');

        let route = "pages";
        let file = "login";

        loadTemplate(route, file);  // Llamamos a la función loadTemplate con los parámetros correspondientes
    }
});


