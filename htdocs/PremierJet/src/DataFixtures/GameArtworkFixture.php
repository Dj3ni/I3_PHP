<?php

namespace App\DataFixtures;

use App\Entity\GameArtwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GameArtworkFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            
            $gameArtwork = new GameArtwork([
                "title" =>$faker->catchPhrase(),
                "minPlayers"=> $faker->randomNumber(2,1,100),
                "maxPlayers"=> $faker->randomNumber(2,2,100),
                "ageMin"=> $faker->randomNumber(2,2,16),
                "description" => $faker->text(200),
                "picture"=> $faker->text(50),
                "editor" => $faker->word(),
                "edition" =>$faker->sentence(),
            ]);
            $manager->persist($gameArtwork);
        }
        $manager->flush();
    }
}
