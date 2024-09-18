<?php
// Fixture de liaison

namespace App\DataFixtures;

use App\Entity\Acteur;
use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActeurFilmType extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // 1. Obtenir tous les films
        $repFilms = $manager->getRepository(Film::class);
        $films = $repFilms->findAll();

        // 2. Obtenir tous les acteurs
        $repActeurs = $manager->getRepository(Acteur::class);
        $acteurs = $repActeurs->findAll();

        // 3. Fixer un acteur pour un film
        foreach($films as $film){
            for($i = 0 ; $i< 5; $i++){
                $acteur = $acteurs[mt_rand(0,count($acteurs)-1)];
                $film->addCasting($acteur);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return([ActeurFixture::class, FilmFixture::class]);
    }
}
