//Petit calendrier "réserver" en hover (dans header)
var resalien = document.querySelector(".resalien");
var cal = document.querySelector(".cal");

resalien.addEventListener("mouseover", mOver, false);
resalien.addEventListener("mouseleave", mOut, false);

function mOver() {
   cal.setAttribute("src", "img/cal-ok.svg")
}

function mOut() {  
   cal.setAttribute("src", "img/cal.svg")
}