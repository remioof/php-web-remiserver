$( '.nav-link' ).hover(
  function() {
    $(this).parentsUntil('nav').siblings('li').addClass('inactive');
  }, function() {
    $(this).parentsUntil('nav').siblings('li').removeClass('inactive');
  }
);


// $('.btn-drop').click(
//   function () {
//     $('.btn-drop').not(this).removeClass('hide');
//     $(this).addClass('hide');
// }); 

// $('#pane-hide').click(function() {$(this).addClass('hide'); $('#pane-show').removeClass('hide'); $('#news').parent().addClass('hide')})
// $('#pane-show').click(function() {$(this).addClass('hide'); $('#pane-hide').removeClass('hide'); $('#news').parent().removeClass('hide')})