<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple fonctions AJAX</title>
</head>
<body>
    <script>
        function f1(n){
            while (n >= 0){
                if (n === 0){
                    console.log("Décollage");
                }
                else{
                    console.log(n);
                }               
                n--;
            }
        }
        // f1(10);
        // Fonction qui prend plein de temps à finir
        function f1Longue(){
            let a
            for (let i = 0; i < 10000000000; i++) {
                a =i;
                
            }
        }

        function f2(){
            console.log("Je suis f2");
            f1Longue();
            console.log("on a fini la f1longue");
        }

        // f1Longue()
        // console.log("on a fini");
        f2();
        console.log("on a fini f2");

    </script>
    
</body>
</html>