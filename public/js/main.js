$( '#navbar-servers > .nav-link' ).hover(
  
  function() {
    $(this).siblings('a').not(this).addClass('inactive');
    jumbo = $('#jumbotron').find('h3');
    jumbo.text($(this).attr('title'));
    jumbo.css('display','inherit')
    jumbo.addClass('bg-h-med')
  }, function() {
    $(this).siblings('a').not(this).removeClass('inactive');
    jumbo = $('#jumbotron').find('h3');
    jumbo.text('');
    jumbo.removeClass('bg-h-med');
    jumbo.css('display','none')

  }
);

$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide');
    $('#burger').html($('#burger').html() == '☰' ? 'X' : '☰');
  }
);

// $('#navbar-links > .nav-link').hover(
//   function() {
//     if($(this).children('span').length > 0){
//       console.log($(this).children('span').css('opacity', '100%'));
//     }
//   },
  
//   function() {
//     if($(this).children('span').length > 0){
//       console.log($(this).children('span').css('opacity', '0%'));
//     }
//   }

// )

// $(selector).css(propertyName, value);