const btnCart = document.getElementById("btnCart");
console.log(btnCart);
const btnClearCart = document.getElementById("btnClearCart");
const cartLink = document.getElementById("cartLink");
console.log(cartLink);
const btnCancel = document.getElementById("btnCancel");
console.log(btnCancel);
const CART_ARTICLE = document.getElementById("cartArticle");
console.log(CART_ARTICLE);



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


btnClearCart.addEventListener("click",function(){
    // session_start()
    // unset($_SESSION['panier']);
    window.location.href = "./viderPanier.php";
})

// btnCancel.addEventListener("click",(event)=>{
//     const CURRENT_DIV = event.target.
    
//     CART_ARTICLE.remove();
// })

