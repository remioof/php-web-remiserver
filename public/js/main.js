$( '#navbar-servers > .nav-link' ).hover(
  function() {
    $(this).siblings('a').not(this).addClass('inactive');
    $('#jumbotron').find('h3').text($(this).attr('title'));
    $('#jumbotron').find('h3').addClass('bg-h-med')
    // console.log($('#jumbotron').find('h3').html())    
    //console.log($(this).attr("title"));
  }, function() {
    $(this).siblings('a').not(this).removeClass('inactive');
    $('#jumbotron').find('h3').text('');
    $('#jumbotron').find('h3').removeClass('bg-h-med')
  }
);

$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide');
    $('#burger').html($('#burger').html() == '☰' ? 'X' : '☰');
  }
);