// footer manager class
class FooterManager {
    constructor() {
        // Obtenemos el elemento del footer por su ID y lo guardamos como propiedad del objeto
        this.footerElement = document.getElementById('footer');
    }

    // Método que recibe un elemento HTML y lo agrega al final del footer
    addElement(element) {
        this.footerElement.appendChild(element);
    }

    // Método que recibe un elemento HTML y lo agrega al inicio del footer
    addElementAtStart(element) {
        // Obtenemos el primer hijo del footer
        const firstChild = this.footerElement.firstChild;

        // Si hay un hijo, insertamos el nuevo elemento antes de él, de lo contrario lo agregamos al final
        if (firstChild) {
            this.footerElement.insertBefore(element, firstChild);
        } else {
            this.footerElement.appendChild(element);
        }
    }

    // Método que recibe un elemento HTML y lo remueve del footer
    removeElement(element) {
        this.footerElement.removeChild(element);
    }
}
export default FooterManager;