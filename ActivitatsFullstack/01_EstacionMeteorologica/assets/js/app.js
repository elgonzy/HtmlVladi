// Importar las clases de los manejadores de HTML
import HeadManager from "./classes/base/WebManagers/HeadManager.js";
import AlertManager from "./classes/base/WebManagers/AlertManager.js";
import CookieManager from "./classes/base/WebManagers/CookieManager.js";
import NavManager from "./classes/base/WebManagers/NavManager.js";
import FooterManager from "./classes/base/WebManagers/FooterManager.js";

// Crear instancias de los manejadores de HTML
const headManager = new HeadManager();
const alertManager = new AlertManager();
const cookieManager = new CookieManager();
const navManager = new NavManager("headerNav");
const footerManager = new FooterManager();

// Generar el encabezado b�sico y la navegaci�n
headManager.generateBasicHeader();
navManager.generateBasicNav();

// Obtener la URL actual y establecer la opci�n de navegaci�n activa correspondiente
console.log(window.location.href);
navManager.setActiveNavItem("active", window.location.href);

// Si no se ha aceptado la pol�tica de cookies, mostrar una alerta de confirmaci�n y establecer una cookie de aceptaci�n con una duraci�n de 3 d�as
if (!cookieManager.get("acceptCookies")) {
    alertManager.generateConfirmation("�Aceptas las cookies?", cookieManager.set("acceptCookies", true, 3));
}

let entityCDMHanderlerWindows = ["aus.html", "mamifers.html", "reptils.html", "cuidadors.html", "socis.html"];

entityCDMHanderlerWindows.forEach(actualWindow => {
    if (window.location.href.includes(actualWindow)) {
        console.log("deberia meter cosas para esta ventana ");
        headManager.addScript("assets/js/entityCDMController.js", "module");
    }

});