// get setting value
// $(document).ready(function() {
//   $.getJSON('/settings', function(response) {
//     $('input[name="id"]').val(response.tz.id);
//     $('input[name="name"]').val(response.tz.name);
//     $('input[name="value"]').val(response.tz.value);
//   })
//     .fail(function() {
//       console.log('error');
//     });
// });

// update settings value
$('#submit').click(function(e) {
  e.preventDefault();
  // let id = $('input[name="id"]').val();
  // let name = $('input[name="name"]').val();
  let value = $('input[name="value"]').val();
  $.post('/settings/edit', {
    // id: id,
    // name: name,
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
