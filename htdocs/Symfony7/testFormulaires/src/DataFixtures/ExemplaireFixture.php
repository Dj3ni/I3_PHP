<?php

namespace App\DataFixtures;

use App\Entity\Film;
use App\Entity\Exemplaire;
use App\DataFixtures\FilmFixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExemplaireFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");

        // 1. Obtenir tous les éléments de l'Entité côté 1
        $rep = $manager->getRepository(Film::class);
        $films = $rep->findAll();

        for ($i=0; $i < 20; $i++){
            $ex = new Exemplaire (
                [
                    // "etat" => $faker->randomElement("neuf", "griffé","perdu"),
                    "etat" => "neuf",
                ]
                );
                // Lier l'exemplaire à un livre côté 1
                $ex->setFilm($films[rand(0,count($films)-1)]);
                $manager->persist($ex);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return([FilmFixture::class ]);
    }

}
