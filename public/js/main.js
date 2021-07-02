
// navbar jq dom events onHover
navcont = $('#navbar-servers > div');

navcont.children('.nav-link').hover(
  function() {
    navs = $(this).siblings('a').not(this);
    jumbo = $('#jumbotron').find('h3');

    navs.addClass('inactive');
    navs.children('svg').css('padding','.3rem');
    jumbo.text($(this).attr('title'));
    jumbo.css('display','inherit')
    jumbo.addClass('bg-h-med')
  }, function() {
    navs = $(this).siblings('a').not(this);
    jumbo = $('#jumbotron').find('h3');

    navs.removeClass('inactive');
    navs.children('svg').css('padding','.2rem');
    jumbo.text('');
    jumbo.removeClass('bg-h-med');
    jumbo.css('display','none')

  }
);

//todo: if more than 4 servers, the navbar should adapt 
//navbar jq if parent elem has more than 4 child then hide the children.
$(function () {
  navcont.each(function (index, el) {  
    $(this).children(":gt(3)").css('display','none  ');
  });
});

// navbar burger
$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide');
    $('#burger').html($('#burger').html() == '☰' ? 'X' : '☰');
  }
);