// if any of you reading knows js beter, help me review/correct these 

// onload 
if(sessionStorage.getItem("lastPos")+"px"){
  $("html, body").animate({ scrollTop: sessionStorage.getItem("lastPos")+"px" }, 0);
  setBodyPos();
}

document.body.addEventListener('scroll', throttle(setBodyPos, 50));


// events

$(function () {
  el = $('#navbar-servers').find('div')
  el.each(function (index) {
      var self = this; 
      setTimeout(function () {
        $(self).removeClass('gone');
      }, index*200);
      
    });
});

$('#burger').click(
  function(){
    $('#navbar').toggleClass('hide');
    $('#burger').html($('#burger').html() == '☰' ? 'X' : '☰');
  }
);

// methods

function setBodyPos() {
  ypos = window.scrolly || document.documentElement.scrollTop || document.body.scrollTop;
  sessionStorage.setItem("lastPos", ypos);
};

function throttle(fn, wait) {
  var time = Date.now();
  return function() {
    if ((time + wait - Date.now()) < 0) {
      fn();
      time = Date.now();
    }
  }
}

function copyToClipboard(el){
  var text = el.getAttribute('copytarget') 
  var temp = document.createElement('textarea'); 

  temp.setAttribute("contentEditable", true); 
  temp.innerHTML = text; 
  
  el.appendChild(temp); 
  
  temp.focus();
  temp.setSelectionRange(0, temp.innerHTML.length); 
  
  var result = false;
  try {
    result = document.execCommand("copy"); 
  } catch (error) {
    console.log("Can't copy to clipboard; " + error); 
  }
  
  el.removeChild(temp);

  // alert("Copied to Clipboard: " + text);
  showModal("Copied to Clipboard", text);
}

function showModal(strhead, strcontent){
  var modal = document.getElementById("modal");
  
  if(modal){
    $(modal).children('p').html(strhead + "<br><span style=\"opacity: 60%;\"><small>" + strcontent + "</small></span>");
    modal.style.display = "block";
    
    $(modal)
      
      .animate({ 
        opacity : 1,
        top: '3rem',
      }, 100)

      .delay(1400)
      
      .animate({ 
        opacity : 0,
        top: '-3rem',
      }, 100, function(){
        modal.style.display = "none";
        $(modal).children('p').html('');
      });
    
    }
}