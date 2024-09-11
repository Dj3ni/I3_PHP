<?php

namespace App\DataFixtures;

use App\Entity\Airport;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AirportFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i < 100; $i++){
            $faker = \Faker\Factory::create(); //fr_BE si on veut des données belges
            $airport = new Airport([
                "name" => $faker->city(),
                "code" => $faker->stateAbbr(), // ou countryIsoAlpha3() si Belgique
                "description"=>$faker->text(),
                "dateMiseEnService" => $faker->DateTime(),
                "heureMiseEnService"=> $faker->DateTime(),
            ]);
            $manager->persist($airport);
            // dd($airport);
        }
        $manager->flush();
    }
}
