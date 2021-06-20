$( ".nav-link" ).hover(
  function() {
    //$(this).siblings('div').addClass('unhide');
    $(this).parentsUntil('nav').siblings('li').addClass('inactive');
  }, function() {
    //$(this).siblings('div').removeClass('unhide');
    $(this).parentsUntil('nav').siblings('li').removeClass('inactive');
  }
);


// todo: btn-drop onclick hide and unhide news

// todo: fix on mobile tap?
// $( ".nav-link" ).on( "tap", 
// function() {
//   $(this).parentsUntil('nav').siblings('li').addClass('svg-unfocus');
// }, function() {
//   $(this).parentsUntil('nav').siblings('li').removeClass('svg-unfocus');
//   }
// );
