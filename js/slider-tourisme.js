//Slider des activités à faire dans la région
var slidert = document.querySelector(".slidert");
var slidet = document.getElementsByClassName("slidet");
var suivantt = document.querySelector(".suivantt");
var precedentt = document.querySelector(".precedentt");
var count = 0;
var nb = slidet.length;


function enleverActivet() {
    for(var i = 0; i < nb; i++) {
        slidet[i].classList.remove('active');
    }
}

function decaleSuivantt() {
    count++;
    if(count >= nb) {
        count=0;
    }
    enleverActivet();
    slidet[count].classList.add('active');
}

function decalePrecedentt(){
    count--;
    if(count < 0){
        count=nb-1;
    }
    enleverActivet();
    slidet[count].classList.add('active');
}

suivantt.addEventListener('click', decaleSuivantt);
precedentt.addEventListener('click', decalePrecedentt);

