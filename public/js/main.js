if(sessionStorage.getItem("lastPos")+"px"){
  $("html, body").animate({ scrollTop: sessionStorage.getItem("lastPos")+"px" }, 0);
  setBodyPos();
}

document.body.addEventListener('scroll', throttle(setBodyPos, 50));

function setBodyPos() {
  ypos = window.scrolly || document.documentElement.scrollTop || document.body.scrollTop;
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

//clipboard
function copyToClipboard(el){
  // this only works for any elements with "pseudo" attribite copytarget="value" with onclick=FunctionName(this), <a> or <button> will do
  var text = el.getAttribute('copytarget') //get value from attr
  var temp = document.createElement('textarea'); //make a selectable-editable <textarea> el
  temp.setAttribute("contentEditable", true); //bitch
  temp.innerHTML = text; //apend value
  el.appendChild(temp); //append el as child
  temp.focus();
  temp.setSelectionRange(0, temp.innerHTML.length); //get selection
  var result = false;
  try {
    result = document.execCommand("copy"); 
  } catch (error) {
    console.log("Can't copy to clipboard; " + error); //echo error if browser cant clip 
  }
  el.removeChild(temp); //yeet
}

