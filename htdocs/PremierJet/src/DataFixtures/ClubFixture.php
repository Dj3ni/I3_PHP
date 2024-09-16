<?php

namespace App\DataFixtures;

use App\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Enum\GameType;

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
                "description"=>$faker->text(200),                
            ]);
            $club->setGameType(GameType::STRATEGY);
            $manager->persist($club);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return([AddressFixture::class]);
    }
}
