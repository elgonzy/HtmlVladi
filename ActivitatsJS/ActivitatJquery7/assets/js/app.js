$(document).ready(function() {
    // obtenemos las cajas y sus tamaños
    var caja1 = $('.caja-1');
    var caja2 = $('.caja-2');
    var leftPos = caja1.position().left;
    var topPos = caja1.position().top;
    var caja1 = $('.caja-1');
    var caja1Width = caja1.width();
    var caja1Height = caja1.height();
    var caja2Width = caja2.width();
    var caja2Height = caja2.height();

    // generamos valores aleatorios para las coordenadas left y top de cada caja
    var caja1LeftPos = Math.floor(Math.random() * ($(window).width() - caja1Width));
    var caja1TopPos = Math.floor(Math.random() * ($(window).height() - caja1Height));
    var caja2LeftPos = Math.floor(Math.random() * ($(window).width() - caja2Width));
    var caja2TopPos = Math.floor(Math.random() * ($(window).height() - caja2Height));

    // actualizamos las posiciones de las cajas si las coordenadas están dentro de los límites de la pantalla
    if (caja1LeftPos > 0 && caja1TopPos > 0) {
        caja1.css({
            'left': caja1LeftPos + 'px',
            'top': caja1TopPos + 'px'
        });
    }
    if (caja2LeftPos > 0 && caja2TopPos > 0) {
        caja2.css({
            'left': caja2LeftPos + 'px',
            'top': caja2TopPos + 'px'
        });
    }


    // agregamos un evento de clic a cada flecha
    $('.up').click(function() {
        // movemos la caja hacia arriba (restamos 20px de la posición "top")
        if (topPos > 0) {
            topPos -= 20;
            caja1.css('top', topPos);
            moveCaja2();
        }
    });

    $('.down').click(function() {
        // movemos la caja hacia abajo (sumamos 20px a la posición "top")
        if (topPos + caja1Height < $(window).height()) {
            topPos += 20;
            caja1.css('top', topPos);
            moveCaja2();
        }
    });

    $('.left').click(function() {
        // movemos la caja hacia la izquierda (restamos 20px de la posición "left")
        if (leftPos > 0) {
            leftPos -= 20;
            caja1.css('left', leftPos);
            moveCaja2();
        }
    });

    $('.right').click(function() {
        // movemos la caja hacia la derecha (sumamos 20px a la posición "left")
        if (leftPos + caja1Width < $(window).width()) {
            leftPos += 20;
            caja1.css('left', leftPos);
            moveCaja2();
        }
    });

    function moveCaja2() {
        // obtenemos la caja y su tamaño
        var caja = $('.caja-2');
        var cajaWidth = caja.width();
        var cajaHeight = caja.height();

        // generamos valores aleatorios para las coordenadas left y top
        var leftPos = Math.floor(Math.random() * ($(window).width() - cajaWidth));
        var topPos = Math.floor(Math.random() * ($(window).height() - cajaHeight));

        // actualizamos la posición de la caja si las coordenadas están dentro de los límites de la pantalla
        if (leftPos > 0 && topPos > 0) {
            caja.css({
                'left': leftPos + 'px',
                'top': topPos + 'px'
            });
        }
    }

    // evento de clic para la caja 2
    caja2.click(function() {
        // ocultamos la caja 2 al hacer clic en ella
        caja2.hide();
    });
    var caja1 = $('.caja-1');
    var caja2 = $('.caja-2');

    // evento de clic para la caja 1
    caja1.click(function() {
        // obtenemos la posición y altura de la caja 1
        var caja1Offset = caja1.offset();
        var caja1Height = caja1.height();

        // movemos la caja 2 debajo de la caja 1
        caja2.css({
            top: caja1Offset.top + caja1Height + 10, // agregamos 10px de separación
            left: caja1Offset.left
        });
    });

});