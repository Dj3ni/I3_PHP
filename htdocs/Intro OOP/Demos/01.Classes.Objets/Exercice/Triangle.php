<?php

declare (strict_types = 1);



// Cette méthode ne fonctionne pas


class Triangle{
    private array $sommet1;
    private array $sommet2;
    private array $sommet3;
    private string $color;

    public function __construct(array $s1,array $s2, array $s3, string $color)
    {
        $this->sommet1 = $s1;
        $this->sommet2 = $s2;
        $this->sommet3 = $s3;
        $this->color = $color;
    }

    // Setters et getters
    



    /**
     * Get the value of sommet1
     */
    public function getSommet1(): array
    {
        return $this->sommet1;
    }

    /**
     * Set the value of sommet1
     */
    public function setSommet1(array $sommet1): self
    {
        $this->sommet1 = $sommet1;

        return $this;
    }

    /**
     * Get the value of sommet2
     */
    public function getSommet2(): array
    {
        return $this->sommet2;
    }

    /**
     * Set the value of sommet2
     */
    public function setSommet2(array $sommet2): self
    {
        $this->sommet2 = $sommet2;

        return $this;
    }

    /**
     * Get the value of sommet3
     */
    public function getSommet3(): array
    {
        return $this->sommet3;
    }

    /**
     * Set the value of sommet3
     */
    public function setSommet3(array $sommet3): self
    {
        $this->sommet3 = $sommet3;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Set the value of color
     */
    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    // Méthodes

    public function displayCoordonates(): void{
        echo( "x1". $this->sommet1[0]. ", y1".$this->sommet1[1]. "\n");
        echo( "x2". $this->sommet2[0]. ", y2".$this->sommet2[1]. "\n");
        echo( "x3". $this->sommet3[0]. ", y2".$this->sommet3[1]. "\n");
    }

    public function moveTriangle($x,$y):void{
        $this->sommet1 = [$this->sommet1[0] + $x, $this->sommet1[1] + $y];
        $this->sommet2 = [$this->sommet2[0] + $x, $this->sommet2[1] + $y];
        $this->sommet3 = [$this->sommet3[0] + $x, $this->sommet3[1] + $y];
    }


    public function dessiner() {
        $largeur = 200;
        $hauteur = 200;

        // Créer une image
        $image = imagecreatetruecolor($largeur, $hauteur);

        // Définir la couleur de fond en blanc
        $blanc = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $blanc);

        // Définir la couleur du triangle
        list($r, $g, $b) = $this->hexToRgb($this->color);
        $couleurTriangle = imagecolorallocate($image, $r, $g, $b);

        // Dessiner le triangle
        $points = [
            $this->sommet1[0], $this->sommet1[1],
            $this->sommet2[0], $this->sommet2[1],
            $this->sommet3[0], $this->sommet3[1],
        ];
        imagefilledpolygon($image, $points, 3, $couleurTriangle);

        // Afficher l'image
        header('Content-Type: image/png');
        imagepng($image);
        imagedestroy($image);
    }

    private function hexToRgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }

        return [$r, $g, $b];
    }
    

}


// class Triangle{

//     public array $array_points;
//     public string $color;

//     public function drawTriangle(GdImage $image)
//     {
//         $color = $this->allocateColor($image);
//         imagefilledpolygon($image, $this->array_points, 3,$color);
//     }

//     private function allocateColor(GdImage $image)
//     {
//         switch ($this->color){
//             case "white":
//                 return imagecolorallocate($image, 255, 255, 255);
//             case 'black':
//                 return imagecolorallocate($image, 0, 0, 0);
//             case 'red':
//                 return imagecolorallocate($image, 255, 0, 0);
//             case 'green':
//                 return imagecolorallocate($image, 0, 255, 0);
//             case 'blue':
//                 return imagecolorallocate($image, 0, 0, 255);
//             default:
//                 return imagecolorallocate($image, 0, 0, 0); // Default to black if color not recognized
//         }
//     }

// }

// Créer une image avec GD
// $image = imagecreatetruecolor(250,250);
// // Définir la couleur de fond
// $white = imagecolorallocate($image, 255, 255, 255);
// imagefill($image, 0, 0, $white);

// Exemple de test pour remplir l'image avec une couleur
// imagefilledrectangle($image, 0, 0, 199, 199, imagecolorallocate($image, 0, 0, 0)); // Remplir avec du noir
// header('Content-Type: image/png');
// imagepng($image);
// imagedestroy($image);

