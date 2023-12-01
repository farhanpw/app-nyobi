// JS scroll bar
document.addEventListener('DOMContentLoaded', function() {
    let navbar = document.getElementById('navbar');
  
    window.onscroll = function() {
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    };
  });
  

//JS live search
let filterarray = [];

let galleryarray = [
  
];