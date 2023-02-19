//Slider avec défilement automatique et transition avec opacity
var slider = document.querySelector(".slider");
var slide = document.getElementsByClassName("slide");
var suivant = document.querySelector(".suivant");
var precedent = document.querySelector(".precedent");
var count = 0;
var nb = slide.length;


function enleverActive() {
    for(var i = 0; i < nb; i++) {
        slide[i].classList.remove('active');
    }
}

function decaleSuivant() {
    count++;
    if(count >= nb) {
        count=0;
    }
    enleverActive();
    slide[count].classList.add('active');
}

function decalePrecedent(){
    count--;
    if(count < 0){
        count=nb-1;
    }
    enleverActive();
    slide[count].classList.add('active');
}

suivant.addEventListener('click', decaleSuivant);
precedent.addEventListener('click', decalePrecedent);
setInterval(decaleSuivant, 4500);
