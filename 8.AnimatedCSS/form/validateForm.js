$('#modal-dialog').on('show', function() {
  var link = $(this).data('link'),
      confirmBtn = $(this).find('.confirm');
})


$('#btnYes').click(function() {

  // handle form processing here
  
  alert('submit form');
  $('form').submit();

});
