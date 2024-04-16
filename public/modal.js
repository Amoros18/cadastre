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
});