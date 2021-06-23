$( '#navbar-servers > .nav-link' ).hover(
  function() {
    $(this).siblings('a').not(this).addClass('inactive');
  }, function() {
    $(this).siblings('a').not(this).removeClass('inactive');
  }
);


$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide')
  }
);