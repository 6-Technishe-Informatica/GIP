var div1  = document.getElementById("naam");
var div2  = document.getElementById("gebruikersnaam");
var div3  = document.getElementById("email");
var div4  = document.getElementById("wachtwoord");
var display = 0;

function ShowNaam(){
    if (display == 1){
        div1.style.display = "block";
        display = 0;
    }
    else{
        div1.style.display = "none";
        display = 1;
    }
}
function ShowGebruikersnaam(){
    if (display == 1){
        div2.style.display = "block";
        display = 0;
    }
    else{
        div2.style.display = "none";
        display = 1;
    }
}
function ShowEmail(){
    if (display == 1){
        div3.style.display = "block";
        display = 0;
    }
    else{
        div3.style.display = "none";
        display = 1;
    }
}
function ShowWachtwoord(){
    if (display == 1){
        div4.style.display = "block";
        display = 0;
    }
    else{
        div4.style.display = "none";
        display = 1;
    }
}