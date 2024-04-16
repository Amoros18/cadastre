var division = document.getElementById('deroulante');

function afficherMasquerDivision(){
    if(division.style.display ==='none'){
        division.style.display = 'block';
    }
    else{
        division.style.display = 'none';
    }
}

var bouton = document.getElementById('bouton-affiche-masquer');
var division = document.getElementById('deroulante');
bouton.addEventListener('click',afficherMasquerDivision);