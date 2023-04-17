// Creamos una clase llamada AlertManager
class AlertManager {
    constructor() {
        // Definimos dos propiedades para almacenar los elementos HTML que se generarán
        this.alertContainer = null;
        this.confirmContainer = null;
        // Definimos una propiedad para saber si la página es navegable o no
        this.isNavigable = true;
    }

    // Método para generar un cuadro de alerta con un mensaje
    generateAlert(message) {
        // Si el contenedor de alerta no existe, lo creamos
        if (!this.alertContainer) {
            // Creamos el elemento HTML para el contenedor de alerta y le añadimos la clase 'alert-container'
            this.alertContainer = $('<div>', {
                class: 'alert-container'
            });
            // Creamos el elemento HTML para el cuadro de alerta y le añadimos la clase 'alert-box'
            const alertBox = $('<div>', {
                class: 'alert-box'
            });
            // Creamos el elemento HTML para el mensaje de alerta y le añadimos la clase 'alert-message'
            const alertMessage = $('<p>', {
                text: message,
                class: 'alert-message'
            });
            // Creamos el elemento HTML para el botón de aceptar y le añadimos la clase 'alert-button'
            const alertButton = $('<button>', {
                text: 'Aceptar',
                class: 'alert-button'
            });
            // Añadimos un evento 'click' al botón de aceptar que elimina el contenedor de alerta y vuelve a habilitar la navegación
            alertButton.on('click', () => {
                this.alertContainer.remove();
                this.isNavigable = true;
            });
            // Añadimos el mensaje de alerta y el botón de aceptar al cuadro de alerta
            alertBox.append(alertMessage, alertButton);
            // Añadimos el cuadro de alerta al contenedor de alerta
            this.alertContainer.append(alertBox);
            // Añadimos el contenedor de alerta al cuerpo del documento HTML
            $('body').append(this.alertContainer);
            // Deshabilitamos la navegación hasta que se haga clic en el botón de aceptar
            this.isNavigable = false;
        }
    }

    // Método para generar un cuadro de confirmación con un mensaje y una función a ejecutar cuando se confirma

    generateConfirmation(message, onConfirm) {
        // Si no se ha creado previamente un contenedor de confirmación, crear uno nuevo
        if (!this.confirmContainer) {
            // Crear el contenedor de confirmación y su caja
            this.confirmContainer = $('<div>', {
                class: 'confirm-container'
            });
            const confirmBox = $('<div>', {
                class: 'confirm-box'
            });

            // Crear el mensaje de confirmación y los botones de confirmación
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

            // Manejar eventos de clic para los botones de confirmación
            confirmOk.on('click', () => {
                this.confirmContainer.remove();
                this.isNavigable = true;
                onConfirm();
            });
            confirmCancel.on('click', () => {
                this.confirmContainer.remove();
                this.isNavigable = true;
            });

            // Agregar el mensaje de confirmación y los botones de confirmación a la caja de confirmación
            confirmButtons.append(confirmOk, confirmCancel);
            confirmBox.append(confirmMessage, confirmButtons);

            // Agregar la caja de confirmación al contenedor de confirmación y agregar el contenedor de confirmación al cuerpo del documento
            this.confirmContainer.append(confirmBox);
            $('body').append(this.confirmContainer);

            // Hacer que la página no sea navegable mientras el elemento de confirmación está en pantalla
            this.isNavigable = false;
        }
    }

}
export default AlertManager;