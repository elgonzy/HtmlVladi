$(document).ready(function() {
    var points = 0;
    var countdown = 60;
    var timer;
    
    var caja1 = $('.caja-1');
    var caja2 = $('.caja-2');
    var caja3 = $('.caja-3');

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
      
      
    // Actualitza la puntuació
    function updatePoints() {
      $("#points").text(points);
    }
  
    // Inicia el cronòmetre
    function startTimer() {
      timer = setInterval(function() {
        countdown--;
        $("#countdown").text(countdown);
        moveCaja(caja1);
        moveCaja(caja2);
        moveCaja(caja3);
        if (countdown === 0) {
          clearInterval(timer);
          $(".element").hide();
        }
      }, 1000);
    }
  
    // Augmenta la velocitat
    function increaseSpeed(element) {
      var currentSpeed = parseFloat(element.css("animation-duration"));
      var newSpeed = currentSpeed * 0.9;
    }

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
              points = points - 100;
            } else {
              $(this).hide();
              increaseSpeed($(this));
              points = points + 100;
            }
            updatePoints();
      
            setTimeout(function() {
              setPositionRandomly(caja);
              $(caja).show();
            }, 1000);
          });
        }
      }
      
      
      
    
    // Inicia el joc
    startTimer();
    createBoxes();
  });
  