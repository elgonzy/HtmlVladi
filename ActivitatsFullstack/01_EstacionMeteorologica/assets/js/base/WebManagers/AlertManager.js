// Creamos una clase llamada AlertManager
class AlertManager {
    constructor() {
        // Definimos dos propiedades para almacenar los elementos HTML que se generar�n
        this.alertContainer = null;
        this.confirmContainer = null;
        // Definimos una propiedad para saber si la p�gina es navegable o no
        this.isNavigable = true;
    }

    // M�todo para generar un cuadro de alerta con un mensaje
    generateAlert(message) {
        // Si el contenedor de alerta no existe, lo creamos
        if (!this.alertContainer) {
            // Creamos el elemento HTML para el contenedor de alerta y le a�adimos la clase 'alert-container'
            this.alertContainer = $('<div>', {
                class: 'alert-container'
            });
            // Creamos el elemento HTML para el cuadro de alerta y le a�adimos la clase 'alert-box'
            const alertBox = $('<div>', {
                class: 'alert-box'
            });
            // Creamos el elemento HTML para el mensaje de alerta y le a�adimos la clase 'alert-message'
            const alertMessage = $('<p>', {
                text: message,
                class: 'alert-message'
            });
            // Creamos el elemento HTML para el bot�n de aceptar y le a�adimos la clase 'alert-button'
            const alertButton = $('<button>', {
                text: 'Aceptar',
                class: 'alert-button'
            });
            // A�adimos un evento 'click' al bot�n de aceptar que elimina el contenedor de alerta y vuelve a habilitar la navegaci�n
            alertButton.on('click', () => {
                this.alertContainer.remove();
                this.isNavigable = true;
            });
            // A�adimos el mensaje de alerta y el bot�n de aceptar al cuadro de alerta
            alertBox.append(alertMessage, alertButton);
            // A�adimos el cuadro de alerta al contenedor de alerta
            this.alertContainer.append(alertBox);
            // A�adimos el contenedor de alerta al cuerpo del documento HTML
            $('body').append(this.alertContainer);
            // Deshabilitamos la navegaci�n hasta que se haga clic en el bot�n de aceptar
            this.isNavigable = false;
        }
    }

    // M�todo para generar un cuadro de confirmaci�n con un mensaje y una funci�n a ejecutar cuando se confirma

    generateConfirmation(message, onConfirm) {
        // Si no se ha creado previamente un contenedor de confirmaci�n, crear uno nuevo
        if (!this.confirmContainer) {
            // Crear el contenedor de confirmaci�n y su caja
            this.confirmContainer = $('<div>', {
                class: 'confirm-container'
            });
            const confirmBox = $('<div>', {
                class: 'confirm-box'
            });

            // Crear el mensaje de confirmaci�n y los botones de confirmaci�n
            const confirmMessage = $('<p>', {
                text: message,
                class: 'confirm-message'
            });
            const confirmButtons = $('<div>', {
                class: 'confirm-buttons'
            });
            const confirmOk = $('<button>', {
                text: 'Aceptar',
                class: 'confirm-button confirm-ok'
            });
            const confirmCancel = $('<button>', {
                text: 'Cancelar',
                class: 'confirm-button confirm-cancel'
            });

            // Manejar eventos de clic para los botones de confirmaci�n
            confirmOk.on('click', () => {
                this.confirmContainer.remove();
                this.isNavigable = true;
                onConfirm();
            });
            confirmCancel.on('click', () => {
                this.confirmContainer.remove();
                this.isNavigable = true;
            });

            // Agregar el mensaje de confirmaci�n y los botones de confirmaci�n a la caja de confirmaci�n
            confirmButtons.append(confirmOk, confirmCancel);
            confirmBox.append(confirmMessage, confirmButtons);

            // Agregar la caja de confirmaci�n al contenedor de confirmaci�n y agregar el contenedor de confirmaci�n al cuerpo del documento
            this.confirmContainer.append(confirmBox);
            $('body').append(this.confirmContainer);

            // Hacer que la p�gina no sea navegable mientras el elemento de confirmaci�n est� en pantalla
            this.isNavigable = false;
        }
    }

}
export default AlertManager;