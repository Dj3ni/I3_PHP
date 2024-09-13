<?php

namespace App\DataFixtures;

use App\Entity\Address;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AddressFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            
            $address = new Address([
                "locality" =>$faker->text(50),
                "street" =>$faker->streetName(),
                "number" =>$faker->buildingNumber(),
                "city" => $faker->city(),
                "postalCode" =>$faker->postcode(),
                "country" => "Belgium",
            ]);
            $manager->persist($address);
        }

        $manager->flush();
    }
}
