$(document).ready(function() {
    $('.red-btn').click(function() {
        $('.parrafo1').toggleClass('red');
    });

    $('.blue-btn').click(function() {
        $('.parrafo2').toggleClass('blue');
    });

    $('.green-btn').click(function() {
        $('.parrafo3').toggleClass('green');
    });

    $('.reset-btn').click(function() {
        $('.parrafo1').removeClass('red');
        $('.parrafo2').removeClass('blue');
        $('.parrafo3').removeClass('green');
    });

    $('#change-image-btn').click(function() {

        let currentSrc = $('#my-image').attr('src');
        let newSrc;
        if (currentSrc == 'assets/img/a.jpg') {

            newSrc = 'assets/img/b.jpg';

        } else {

            newSrc = 'assets/img/a.jpg';

        }

        $('#my-image').attr('src', newSrc);
    });

    let fontSize = 16;
    $('#btn-increase').click(function() {
        fontSize++;
        $('p').css('font-size', fontSize + 'px');
    });
    $('#btn-decrease').click(function() {
        fontSize--;
        $('p').css('font-size', fontSize + 'px');
    });

    $('#btn-toggle-border').click(function() {
        $('#my-image').toggleClass('bordered');
    });

});