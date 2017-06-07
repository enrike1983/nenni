dragula([document.getElementsByTagName('tbody')[0]])
  // .on('drag', function (el) {
  //   el.className = el.className.replace('ex-moved', '');
  // })
  .on('drop', function (el) {

      ids = 

      $.post( Routing.generate('update_home_block_sort'), {
          home_block_id: $(el).attr('data-id'),
          index: $(el).index()
      });
  });