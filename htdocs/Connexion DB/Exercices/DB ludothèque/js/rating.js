// Création des étoiles dans le div
        //1. On va chercher l'élément qui reçoit le menu étoiles (ici div) 
        let ratingStars = document.getElementById("ratingStars");

        // 2.On crée le tableau JSON des différentes notes
        const RATINGS = {
            value: ratingStars.dataset.valeur, //Nombre d'étoiles affichées par défaut
            tooltip: ["Nullissime", "Bof", "Plutôt bien", "Trop chouette", "Prochain As d'or"],
        }
        console.log(ratingStars.dataset.valeur);
        // 3. On utrilise la fonction en mettant en paramètre le lieu qui accueille et le tableau Json avec les différentes valeurs. ( constructeur du plugin)

        let menuStars = jSuites.rating(ratingStars, RATINGS)

        // Faire un appel Ajax pour mettre à jour la note d'utilisateur
        let ratingUser = document.getElementById("ratingUser")
        let menuStarsUser = jSuites.rating(ratingUser, {
            value: ratingUser.dataset.valeur, //Nombre d'étoiles affichées par défaut
            tooltip: ["Nullissime", "Bof", "Plutôt bien", "Trop chouette", "Prochain As d'or"],
            onchange: stockerNote
        })


        function stockerNote() {

            let newNote = true;

            if (ratingUser.dataset.valeur === "") {
                newNote = false; //Ce film est déjà noté par l'utilisateur
            }
            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    console.log("fini");
                }
            }

            // console.log("appel");
            let formData = new FormData();
            formData.append("idJeu", ratingUser.dataset.idjeu);
            formData.append("Valeur", menuStarsUser.getValue());
            formData.append("newNote", newNote);

            xhr.open("POST", "./noteUpdate.php");
            xhr.send(formData);

        }