const btnSearch = document.getElementById("btnSearch");
const inputSearch = document.getElementById("termeRecherche");
const FORM_HTML = document.getElementById("formHTML");
const DIV_JEUX = document.getElementById("divJeux");


inputSearch.addEventListener("keyup",function(){
    // A chaque recherche on vide la div
    DIV_JEUX.innerHTML = "";

    if (inputSearch.value.length === 0) {
        return;
    }
    
    let formData = new FormData(FORM_HTML);//crée un objet JS qui va contenir tous les objets sur la page mais d'abord il faut cibler le formulaire ( contient les données du formulaire)

    // Appel AJAX
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            console.log("Fini");
            // Parser JSON
            let arrayGAMES = JSON.parse (xhr.responseText);
            // Afficher dans le DOM (générer array pour chaque jeu)
            console.log(arrayGAMES);
            
            arrayGAMES.forEach(objetJeu => {
                // DIV_JEUX.innerHTML += objetJeu.titre; affiche juste les titres

                // Afiche le résultat dans des cartes
                DIV_JEUX.innerHTML += 
                
                `<div class='card mb-3' style='max-width: 540px;'> <div class='row no-gutters'>
                    <div class='col-md-4'>
                    <img src='./uploads/${objetJeu.Image}' class='card-img' alt='${objetJeu.Nom}'></div>
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
    }
    xhr.open("POST", "../Traitements Formulaires/ajaxSearchTtt.php");
    xhr.send(formData);// on envoie l'objet formData
    
})

