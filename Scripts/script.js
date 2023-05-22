function OpenMenu() {
    var burger = document.getElementById('mobile');
    burger.style.display = "block";
    document.getElementById('menu-mobile').style.display = "flex";
    document.getElementById('menu-btn').style.display = "none";
    document.body.style.overflow = "hidden";
}

function CloseMenu() {
    var close = document.getElementById('mobile');
    close.style.display = "none";
    document.getElementById('menu-mobile').style.display = "none";
    document.getElementById('menu-btn').style.display = "block";
    document.body.style.overflow = "visible";
}

document.getElementById('menu-btn').onclick = OpenMenu;
document.getElementById('close-button').onclick = CloseMenu;


//Slide Show - Hero
let slideIndex = 1;
const slideImages = [];

function SaveImages(images) {
    slideImages.push(images);
}

showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("hero-image");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "flex";  
  dots[slideIndex-1].className += " active";
}


function ToggleFilter() {
  var x = document.getElementById("filter-form");
  if (x.style.display === "none") {
    x.style.display = "block";
    } else {
      x.style.display = "none";
      }
}