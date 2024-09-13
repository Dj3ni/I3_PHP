<?php

namespace App\DataFixtures;

use App\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClubFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            $club = new Club([
                "name" =>$faker->company(),
                "phoneNumber" =>$faker->phoneNumber(),
                "email" => $faker->regexify(" [^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+ "),
                "type" =>$faker->jobTitle(),
                "description"=>$faker->text(200),
            ]);
            $manager->persist($club);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return([AddressFixture::class]);
    }
}
