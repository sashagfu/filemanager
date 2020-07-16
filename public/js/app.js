// update settings value
$('#submit').click(function(e) {
  e.preventDefault();
  let value = $('input[name="value"]').val();
  $.post('/settings/edit', {
    value: value
  }, function(response) {
    $('.alert-success').html(response.message).show().delay(4000).fadeOut();
    setTimeout(function(){
      $('.alert-success').html('');
      location.reload();
    }, 5000);
  }, 'json')
    .fail(function(jqXHR) {
      $('.alert-danger').html(jqXHR.responseJSON.message).show().delay(4000).fadeOut();
      setTimeout(function(){
        $('.alert-danger').html('');
      }, 5000);
    });
});
