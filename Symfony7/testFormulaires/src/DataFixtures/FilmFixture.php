<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class FilmFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");

        for ($i=0; $i < 20; $i++){
            $faker = \Faker\Factory::create("fr_BE");
            $film = new Film(
                [
                    "titre" => $faker->catchPhrase(),
                    "duree" => $faker->randomNumber(3, false),
                    "synopsis"=>$faker->text(),
                ]
                );
                $manager->persist($film);
        }
        $manager->flush();
    }
}
