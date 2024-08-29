<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boucle évènement</title>
</head>
<body>
    <button id = "btn1" type="submit">Click me1 !</button>
    <button id = "btn2" type="submit">Click me 2!</button>

    <script>
        


        let btn1 = document.getElementById("btn1");
        let btn2 = document.getElementById("btn2");
        let body = document.querySelector("body");

    

        // btn1.addEventListener("click", (event)=>{
        //     console.log("btn1 click!!");
        //     console.log(event); // va affichier l'objet de l'évènement (ici click)
        //     console.log(event.target); //élément qui lance l'évènement (qui a reçu le click)
        //     console.log(event.currentTarget); // élément lié à l'évènement (auquel on a ajoté le listener)
        //     body.style.backgroundColor = "chartreuse";
        // })

        // btn2.addEventListener("click",(event)=>{
        //     body.style.backgroundColor = "blue";
        // })
    // Délégation
        document.addEventListener("click", (event)=>{
            console.log("Je clique sur le documenty n(importe où");
            if (event.target.id === "btn1"){
                console.log("btn1 click!!");
                body.style.backgroundColor = "chartreuse";
            }

            else if(event.target.id === "btn2"){
                console.log("btn2 click!!");
                body.style.backgroundColor = "blue";
            }

            console.log('Target :>> ', event.target);
            console.log('Current Target :>> ', event.currentTarget);            
        })
    

    </script>
    
</body>
</html>