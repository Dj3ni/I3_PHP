<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\GamingPlace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EventFixture extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            
            $event = new Event([
                "title" =>$faker->catchPhrase(),
                "dateStart" =>$faker->dateTime(),
                "dateEnd" => $faker->dateTime(),
                "dateOccurency" =>$faker->randomNumber(2),
                "type"=> $faker ->text(50),
                "fee" => $faker->randomFloat(2,0,500),
            ]);
            $manager->persist($event);
        }

        $manager->flush();
    }

}
