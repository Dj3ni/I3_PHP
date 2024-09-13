<?php

namespace App\DataFixtures;

use App\Entity\Boardgame;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BoardgameFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            $boardgame = new Boardgame([
                "status" => "new",
            ]);
            $manager->persist($boardgame);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return([GameArtworkFixture::class]);
    }
}
