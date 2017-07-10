dragula([document.getElementsByTagName('tbody')[0]])
// .on('drag', function (el) {
//   el.className = el.className.replace('ex-moved', '');
// })
.on('drop', function (el) {

  var ids = [];
  $.each($('.sonata-ba-list tbody tr'), function(key, value) {
      ids.push($(value).find('td').attr('objectid'));
  });

  $.post( Routing.generate('update_block_sort'), {
      ids: ids.join(",")
  });
});