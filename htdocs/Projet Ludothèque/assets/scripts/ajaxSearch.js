// Je vais chercher les éléments

const FORM_HTML = document.getElementById("formHTML");
const INPUT_SEARCH = document.getElementById("termeRecherche");
const BTN_SEARCH = document.getElementById("btnSearch");
const DIV_JEUX = document.getElementById("divJeux");

// Ajout d'un évènement

    // Bouton

    BTN_SEARCH.addEventListener("click", searchDatabase);

    // Selon input

    INPUT_SEARCH.addEventListener("keyup", searchDatabase);


// Fonction de recherche dans DB
function searchDatabase(){
    // 1. On vide la div qui accueille le résultat avant chaque recherche
    DIV_JEUX.innerHTML = "";

    // Si l'input est vide, on ne lance pas de recherche
    if(INPUT_SEARCH.value.lenght === 0) return;

    // 2. On crée l'objet JS qui va accueillir les données du formulaire
    let formData = new FormData(FORM_HTML);

    // 3. On crée l'objet AJAX
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            console.log("fini");
            // Parser le résultat JSON
            let arrayGAMES = JSON.parse(xhr.responseText);
            // Afficher dans le DOM (génère un array pour chaque jeu)
            console.log(arrayGAMES);

            // Afficher le résultat de la recherche dans une carte
            arrayGAMES.forEach(objetJeu => {
                DIV_JEUX.innerHTML += 
                
                `<div class='card mb-3' style='max-width: 540px;'> <div class='row no-gutters'>
                    <div class='col-md-4'>
                    <img src='../uploads/${objetJeu.Image}' class='card-img' alt='${objetJeu.Nom}'></div>
                        <div class='col-md-8'>
                        <div class='card-body'>
                            <h5 class='card-title'><a href="../PagesSite/ficheJeu.php?idJeu=${objetJeu.id}">${objetJeu.Nom}</a></h5>
                            <p class='card-text'>${objetJeu.Description}</p>
                        </div>
                        </div>
                        </div>
                    </div>`
            });
        }
    // On fait l'action et la méthode du formulaire du formulaire
    xhr.open("POST","../Formulaires Traitements/ajaxSearchTtt.php");
    // On envoir l'objet formData qui contient nos données
    xhr.send(formData);
    }

}