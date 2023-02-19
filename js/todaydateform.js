//Dates du formulaire affichées au début (aujourd'hui et demain)
var auj = new Date();
var dem = new Date(auj);
dem.setDate(dem.getDate() + 1);

document.getElementById("check-in").valueAsDate = auj;
document.getElementById("check-out").valueAsDate = dem;

function Nbnuit() {
var timeDiff = Math.abs(dem.getTime() - auj.getTime());
var numberOfNights = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
console.log(numberOfNights + " nights"); 
};

document.getElementById("check-out").onchange=Nbnuit;