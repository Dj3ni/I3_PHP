const btnCart = document.getElementById("btnCart");
console.log(btnCart);

const cartLink = document.getElementById("cartLink");
console.log(cartLink);



btnCart.addEventListener("click", function(){
    // Récupérer la valeur du select'quantité
    let quantity = document.getElementById("selectQuantity");
    console.log(quantity.value);

    // stocker la valeur dans le panier

    let idJeu = quantity.dataset.idjeu; //mettre tout en minuscule sinon donne undefined
    console.log("idFilm:" + idJeu);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4){
            console.log("fini")
            // Voir si code http reçu me concient
            if (xhr.status === 200 || xhr.status === 304){
                 // Afficher la réponse 
                console.log("Réponse");            
            let response = JSON.parse(xhr.responseText);
            console.log(response);
                cartLink.innerText = response.totalQuantity;
            }

            else if (xhr.status === 404){
                console.log("Page introuvable");
                // window.location.href = "./page introuvable.php"
            }
        }
    }

    let formData = new FormData();
    formData.append("idJeu", idJeu);
    formData.append("quantity", quantity.value);
    // console.log(formData);

    xhr.open("POST", "./cart.php");
    xhr.send(formData);

})


