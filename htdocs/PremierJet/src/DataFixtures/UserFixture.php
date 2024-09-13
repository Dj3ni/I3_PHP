<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i<20 ; $i++){
            $faker = \Faker\Factory::create("fr_BE");
            $user = new User([
                "firstname" =>$faker->firstName(),
                "lastname" =>$faker->lastName(),
                "pseudo" => $faker->lexify("?????"),
                "email" => $faker->regexify(" [^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+ "),
            ]);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
