<?php

namespace App\DataFixtures;

use App\Entity\GamingPlace;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GamingPlaceFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            
            $gamingPlace = new GamingPlace([
                "Name" =>$faker->company(),
                "Type" =>$faker->jobTitle(),
                "Description" => $faker->text(200),
            ]);
            $manager->persist($gamingPlace);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return([EventFixture ::class, AddressFixture ::class]);
    }
}
