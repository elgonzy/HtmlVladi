// coockie manager class
class CookieManager {
    // Método para establecer una cookie
    set(name, value, days = 1) {
        // Crear una fecha de expiración para la cookie
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        const expires = "expires=" + date.toUTCString();
        // Establecer la cookie con el nombre, valor y fecha de expiración
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Método para obtener el valor de una cookie
    get(name) {
        // Crear el nombre de la cookie que se buscará
        const cookieName = name + "=";
        // Obtener todas las cookies almacenadas en el navegador
        const cookies = document.cookie.split(";");
        // Buscar la cookie con el nombre especificado
        for (let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i];
            // Eliminar espacios en blanco al principio de la cookie
            while (cookie.charAt(0) === " ") {
                cookie = cookie.substring(1);
            }
            // Si se encuentra la cookie, devolver su valor
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        // Si no se encuentra la cookie, devolver una cadena vacía
        return false;
    }

    // Método para eliminar una cookie
    remove(name) {
        // Establecer la cookie con el nombre especificado y una fecha de expiración anterior a la actual
        this.set(name, "", -1);
    }
}
export default CookieManager;