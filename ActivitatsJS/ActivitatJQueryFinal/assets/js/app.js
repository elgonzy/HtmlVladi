$(document).ready(function() {
    var points = 0; // Puntuación inicial
    var countdown = 60; // Tiempo de cuenta atrás
    var timer; // Referencia al temporizador

    var caja1 = $('.caja-1'); // Referencia a la caja 1
    var caja2 = $('.caja-2'); // Referencia a la caja 2
    var caja3 = $('.caja-3'); // Referencia a la caja 3

    // Crea las cajas y las posiciona aleatoriamente en el DOM
    function createBoxes() {
        // Crear caja1
        caja1 = $("<div>").addClass("caja-1").appendTo("body");
        setPositionRandomly(caja1);

        // Crear caja2
        caja2 = $("<div>").addClass("caja-2").appendTo("body");
        setPositionRandomly(caja2);

        // Crear caja3
        caja3 = $("<div>").addClass("caja-3").appendTo("body");
        setPositionRandomly(caja3);
    }

    // Posiciona un elemento de forma aleatoria en la pantalla
    function setPositionRandomly(element) {
        var elementWidth = element.width();
        var elementHeight = element.height();

        var leftPos = Math.floor(Math.random() * ($(window).width() - elementWidth));
        var topPos = Math.floor(Math.random() * ($(window).height() - elementHeight));

        element.css({
            'left': leftPos + 'px',
            'top': topPos + 'px'
        });
    }

    // Actualiza la puntuación mostrada en pantalla
    function updatePoints() {
        $("#points").text(points);
    }

    // Inicia el temporizador y la lógica del juego
    function startTimer() {
        timer = setInterval(function() {
            countdown--;
            $("#countdown").text(countdown);
            moveCaja(caja1);
            moveCaja(caja2);
            moveCaja(caja3);
            if (countdown === 0) {
                clearInterval(timer);
                a$(".caja-1, .caja-2, .caja-3").hide(); // Oculta todas las cajas al llegar a cero
            }
        }, 1000);
    }

    // Aumenta la velocidad de animación de un elemento
    function increaseSpeed(element) {
        var currentSpeed = parseFloat(element.css("animation-duration"));
        var newSpeed = currentSpeed * 0.9;
        // Aquí podrías aplicar la nueva velocidad al elemento si deseas
    }

    // Mueve una caja a una posición aleatoria y gestiona los clics en las cajas
    function moveCaja(caja) {
        var cajaWidth = caja.width();
        var cajaHeight = caja.height();

        var leftPos = Math.floor(Math.random() * ($(window).width() - cajaWidth));
        var topPos = Math.floor(Math.random() * ($(window).height() - cajaHeight));

        if (leftPos > 0 && topPos > 0) {
            caja.animate({
                'left': leftPos + 'px',
                'top': topPos + 'px'
            }, 1000).click(function() {
                if (caja.hasClass('caja-3')) {
                    $(this).hide();
                    increaseSpeed($(this));
                    points = points - 1; // Resta 100 puntos si es la caja 3
                } else {
                    $(this).hide();
                    increaseSpeed($(this));
                    points = points + 1; // Suma 100 puntos si es cualquier otra caja
                }
                updatePoints();

                setTimeout(function() {
                    setPositionRandomly(caja);
                    $(caja).show();
                }, 1000);
            });
        }
    }

    // Inicia el juego
    startTimer();
    createBoxes();
});
