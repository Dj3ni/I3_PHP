<?php

namespace App\DataFixtures;

use App\Entity\Acteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActeurFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");

        for ($i=0; $i < 20; $i++){
            $faker = \Faker\Factory::create("fr_BE");
            $acteur = new Acteur (
                [
                    "nom" => $faker->lastName(),
                    "prenom" => $faker->firstName(),
                ]
                );
                $manager->persist($acteur);
        }
        $manager->flush();
    }
}
