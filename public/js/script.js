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