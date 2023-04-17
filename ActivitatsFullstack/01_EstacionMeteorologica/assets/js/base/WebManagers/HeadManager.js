class HeadManager {

    constructor() {
        this.head = $('head');
    }

    // M�todo para agregar una etiqueta meta al head
    addMeta(name, content) {
        const meta = $('<meta>', {
            name: name,
            content: content,
        });
        this.head.append(meta);
    }

    // M�todo para agregar una etiqueta link al head
    addLink(rel, href) {
        const link = $('<link>', {
            rel: rel,
            href: href,
        });
        this.head.append(link);
    }

    // M�todo para agregar una etiqueta script al head
    addScript(src, type) {
        const script = $('<script>', {
            src: src,
            type: type
        });
        this.head.append(script);
    }

    // M�todo para eliminar una etiqueta del head por su nombre
    removeElementByName(name) {
        this.head.find(`[name="${name}"], [href="${name}"], [src="${name}"]`).remove();
    }

    generateBasicHeader() {
        // Agregar etiquetas meta
        this.addMeta('charset', 'UTF-8');
        this.addMeta('http-equiv', 'X-UA-Compatible');
        this.addMeta('content', 'IE=edge');
        this.addMeta('name', 'viewport');
        this.addMeta('content', 'width=device-width, initial-scale=1.0');

        // Agregar etiquetas link (css, bootstrap)
        this.addLink('stylesheet', 'assets/css/style.css');
        this.addLink('stylesheet', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');

    }
}

export default HeadManager;