const header = document.querySelector('.header');
const header_as = document.querySelectorAll('.header_as .header_a');
const main = document.querySelector('.bg_main');
const headerHeight= header.offsetHeight;
const mainHeight= main.offsetHeight;

console.log(header_as);

window.addEventListener('scroll', () => {
  let scrollDistance = window.scrollY;

  if (scrollDistance > mainHeight - headerHeight){
    header.classList.add('header_no_opacity');
    for (var i=0; i<header_as.length; ++i) {
      header_as[i].classList.add('header_a_no_opacity');
    }
  } else{
    header.classList.remove('header_no_opacity');
    for (var i=0; i<header_as.length; ++i) {
      header_as[i].classList.remove('header_a_no_opacity');
    }

  }
})
(function(){
  // Выполняем код только на мобильных браузерах (на всякий случай)
  if (typeof(window.orientation) !== 'undefined')
  {
    // Функция взята отсюда: https://makandracards.com/makandra/13743-detect-effective-horizontal-pixel-width-on-a-mobile-device-with-javascript
    function getDeviceWidth()
    {
      var deviceWidth = window.orientation == 0 ? window.screen.width : window.screen.height;
      // iOS returns available pixels, Android returns pixels / pixel ratio
      // http://www.quirksmode.org/blog/archives/2012/07/more_about_devi.html
      if (navigator.userAgent.indexOf('Android') >= 0 && window.devicePixelRatio)
        deviceWidth = deviceWidth / window.devicePixelRatio;

      return deviceWidth;
    }

    var deviceWidth = getDeviceWidth();
    var maxWidth = 900;
    
    if (deviceWidth < maxWidth)
    {
      // Мои эксперименты на iPad 2 показали, что device-width всегда содержит значение ширины 
      // экрана в книжной (portrait) ориентации (т.е. даже, если устройство находится в 
      // альбомной (landscape) ориентации). Это же утверждалось в некоторых найденных мною статьях.
      if (window.orientation == 0 || window.orientation == 180)
        document.write('<meta name="viewport" content="width=device-width">');
      else
        document.write('<meta name="viewport" content="width=device-height">');
    }
    else
      document.write('<meta name="viewport" content="width=' + maxWidth + '">');
  }
})();