let btn1 = document.getElementById("btn1");
let result = document.getElementById("result");

btn1.addEventListener("click",function(){
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function(){
        if (xhr.readyState === 4){
            console.log("On a fini");
            
            // result.innerText = xhr.responseText;
            let arrayObjet = JSON.parse (xhr.responseText);
            console.log(arrayObjet);
            // result.innerText ="Hello " + arrayObjet[1].prenom  + " "+ arrayObjet[1].prenom

            // Vider le div avant de rajouter
            result.innerHTML = "";

            // Afficher un élément

            let ul = document.createElement("ul");

            for(let i in arrayObjet){
                let li = document.createElement("li");
                li.textContent = arrayObjet[i].prenom
                ul.appendChild(li);
                // console.log(arrayObjet[i]);
            }
            result.appendChild(ul);
        }
    }
    xhr.open("GET","./exemple2Traitement.php");
    xhr.send();

});

