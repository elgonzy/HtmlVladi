// clase nav manager
class NavManager {
    constructor(navId) {
        this.nav = $(`#${navId}`);
        this.navItems = this.nav.find('.nav-item');
    }

    // Agrega un nuevo elemento al nav
    addNavItem(text, href, className, imgSrc) {
        const navLink = $('<a>', {
            href: href,
            class: `nav-link ${className}`,
        }).text(text);
        const navItem = $('<li>', {
            class: 'nav-item',
        });
        if (imgSrc) {
            const navImg = $('<img>', {
                src: imgSrc,
                class: 'nav-img',
            });
            navLink.prepend(navImg);
        }
        navItem.append(navLink);
        this.nav.append(navItem);
        this.navItems = this.nav.find('.nav-item');
    }

    // Edita un elemento del nav por su índice
    editNavItem(index, text, href, className, imgSrc) {
        const navLink = this.navItems.eq(index).find('.nav-link');
        navLink.text(text);
        navLink.attr('href', href);
        navLink.attr('class', `nav-link ${className}`);
        if (imgSrc) {
            const navImg = $('<img>', {
                src: imgSrc,
                class: 'nav-img',
            });
            navLink.prepend(navImg);
        } else {
            navLink.find('.nav-img').remove();
        }
    }

    // Elimina un elemento del nav por su índice
    removeNavItem(index) {
        this.navItems.eq(index).remove();
        this.navItems = this.nav.find('.nav-item');
    }

    // Establece la clase activa en el elemento del nav correspondiente a la página actual
    setActiveNavItem(activeClass, pageHref) {
        this.navItems.removeClass(activeClass);
        this.navItems.each(function() {
            const navLink = $(this).find('.nav-link');
            console.log(navLink.attr('href'));
            if (pageHref.includes(navLink.attr('href'))) {
                $(this).addClass(activeClass);
            }
        });
    }

    // Agrega una clase personalizada a un elemento del nav por su índice
    addCustomClassToNavItem(index, className) {
        this.navItems.eq(index).find('.nav-link').addClass(className);
    }

    // Remueve una clase personalizada de un elemento del nav por su índice
    removeCustomClassFromNavItem(index, className) {
        this.navItems.eq(index).find('.nav-link').removeClass(className);
    }

    generateBasicNav() {

        /** TO DO */

    }

}



export default NavManager;