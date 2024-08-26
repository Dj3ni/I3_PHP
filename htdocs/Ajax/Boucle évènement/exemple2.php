<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple 2: boucle évènement</title>
</head>
<body>
    <button id ="btn1"type="submit">Start Timer 5s.</button>
    <button id ="btn2"type="submit">click 2!</button>
    <script>

        let btn1 = document.getElementById("btn1");
        btn1.addEventListener("click",()=>{
            setTimeout(function(){
                btn1.textContent = "C'est fini!";//le code va essayer de réaliser cette partie de code, s'il n'a rien dans le call stack
                console.log("fin de timer");
            },5000);
        })
        let btn2 = document.getElementById("btn2");

        btn2.addEventListener("click",()=>{
            console.log("On clique sur btn2!");
        })




    </script>
</body>
</html>