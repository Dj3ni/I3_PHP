const btnCancel = document.getElementById("btnCancel");
console.log(btnCancel);
const CART_ARTICLE = document.getElementById("cartArticle");
console.log(CART_ARTICLE);
const btnClearCart = document.getElementById("btnClearCart");
console.log(btnClearCart);

btnClearCart.addEventListener("click",function(){
    window.location.href = "./viderPanier.php";
})

// btnCancel.addEventListener("click",(event)=>{
//     const CURRENT_DIV = event.target.
    
//     CART_ARTICLE.remove();
// })