//Menu burger pour responsive
var nav = document.querySelector(".navresp");
var navItems = document.querySelectorAll(".nav-item");
var hamburger= document.querySelector(".hamburger");
var closeIcon= document.querySelector(".close-icon");
var navIcon = document.querySelector(".nav-icon");

function togglenav() {
  if (nav.classList.contains("show-nav")) {
    nav.classList.remove("show-nav");
    closeIcon.style.display = "none";
    navIcon.style.display = "block";
  } else {
    nav.classList.add("show-nav");
    closeIcon.style.display = "block";
    navIcon.style.display = "none";
  }
}

hamburger.addEventListener("click", togglenav);

navItems.forEach( 
  function(navItem) { 
    navItem.addEventListener("click", togglenav);
  }
)

