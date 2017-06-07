dragula([document.getElementsByTagName('tbody')[0]])
  // .on('drag', function (el) {
  //   el.className = el.className.replace('ex-moved', '');
  // })
  .on('drop', function (el) {

      var ids = [];
      $.each($('.table tbody tr'), function(key, value) {
          ids.push($(value).attr('data-id'));
      });

      $.post( Routing.generate('update_home_block_sort'), {
          ids: ids.join(",")
      });
  });