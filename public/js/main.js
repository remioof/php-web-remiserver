// navbar jq dom events onHover
// $('#navbar-servers').find('div').hover(
//   function() {
//     console.log('asdawd');
//     $(this).siblings('div').not(this).addClass('inactive');
//   }, function() {
//     $(this).siblings('div').not(this).removeClass('inactive');
//   }
// );

// its not loading through ajax request. i just added some delay because the initial loading with bunch of stacked animation will jank the brightness and transformation animation properties
$(function () {
  el = $('#navbar-servers').find('div')
  el.each(function (index) {
      var self = this; // the fuck
      setTimeout(function () {
        $(self).removeClass('gone');
      }, index*200);
      
    });
  });

// navbar burger
$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide');
    $('#burger').html($('#burger').html() == '☰' ? 'X' : '☰');
  }
);