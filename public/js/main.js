$( '.nav-link' ).hover(
  function() {
    $(this).parentsUntil('nav').siblings('li').addClass('inactive');
  }, function() {
    $(this).parentsUntil('nav').siblings('li').removeClass('inactive');
  }
);


$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide')
  }
);