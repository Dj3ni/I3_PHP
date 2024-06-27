const btnSearch = document.getElementById("btnSearch");
const inputSearch = document.getElementById("termeRecherche");
const FORM_HTML = document.getElementById("formHTML");




inputSearch.addEventListener("keyup",function(){
    const SEARCH_KEY = inputSearch.value;

    let formData = new FormData(FORM_HTML);//crée un objet JS qui va contenir tous les objets sur la page mais d'abord il faut cibler le formulaire ( contient les données du formulaire)

    // Appel AJAX
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            console.log("Fini");
            // Parser JSON
            let arrayGAMES = JSON.parse(xhr.responseText);
            // Afficher dans le DOM (générer array pour chaque jeu)
            console.log(arrayGAMES);
        }
    }

    xhr.open("POST", "./ajaxSearchTtt.php");
    xhr.send(formData);// on envoie l'objet formData
    
})

