$("html, body").animate({ scrollTop: sessionStorage.getItem("lastPos")+"px" }, 0);
setBodyPos();

// console.log(sessionStorage.getItem("lastPos"))
document.body.addEventListener('scroll', throttle(setBodyPos, 50));

function setBodyPos() {
  ypos = window.scrolly || document.documentElement.scrollTop || document.body.scrollTop;
  // console.log(ypos);
  sessionStorage.setItem("lastPos", ypos);
};
//https://www.sitepoint.com/throttle-scroll-events/
function throttle(fn, wait) {
  var time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}


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

