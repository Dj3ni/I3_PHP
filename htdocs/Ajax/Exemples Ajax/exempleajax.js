let btn1 = document.getElementById("btn1");

btn1.addEventListener("click",function(){
    
    let xhr = new XMLHttpRequest(); 
    xhr.onreadystatechange= function(){
        // console.log("Changement état: ");//étape obligatoire sinon il lnce la requête mais n'attend pas la réponse 
        // console.log(xhr.readyState);

        if(xhr.readyState === 4){ //On définit les changements que l'on souhaite effectuer après l'appel
            console.log("appel complet");
            console.log(xhr.responseText);
        }
    }
    // faire appel au serveur:
    xhr.open("GET","exemple1Traitement.php");
    xhr.send();
    
})




