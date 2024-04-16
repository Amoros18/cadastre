var division = document.getElementById('deroulante');

function afficherMasquerDivision(){
    if(division.style.display ==='none'){
        division.style.display = 'block';
    }
    else{
        division.style.display = 'none';
    }
}

var bouton = document.getElementById('bouton-affiche-masquer-division');
bouton.addEventListener('click',afficherMasquerDivision);

var recherche = document.getElementById('recherche');

function afficherMasquerRecherche(){
    if(recherche.style.display ==='none'){
        recherche.style.display = 'block';
    }
    else{
        recherche.style.display = 'none';
    }
}

var bouton2 = document.getElementById('bouton-affiche-masquer-recherche');
bouton2.addEventListener('click',afficherMasquerRecherche);

/* FENETRE MODAL
const modal = document.getElementById("modal");
const openModalBtn = document.getElementById("open-modal");
const closeModalBtn = document.getElementsByClassName("close")[0];

openModalBtn.addEventListener("click",function(){
    modal.style.display = "block";
});
window.addEventListener("click",function(event){
    if (event.target === modal){
        modal.style.display = "none";
    }
}); */