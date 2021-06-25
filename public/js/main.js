$( '#navbar-servers > .nav-link' ).hover(
  function() {
    $(this).siblings('a').not(this).addClass('inactive');
    // if($('#jumbotron').find('h1')){
    //   console.log($('#jumbotron').find('h1').html());
    // };
  }, function() {
    $(this).siblings('a').not(this).removeClass('inactive');
  
  }
);


$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide');
    $('#burger').html($('#burger').html() == '☰' ? 'X' : '☰');
  }
);