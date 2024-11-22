function getCookie(name) {
    let nameEq = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(nameEq) === 0) {
            return c.substring(nameEq.length, c.length);
        }
    }
    return null; // Si no se encuentra la cookie, devuelve null
}

export default getCookie;