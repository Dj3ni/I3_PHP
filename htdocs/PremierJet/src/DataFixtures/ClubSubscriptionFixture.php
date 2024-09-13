<?php

namespace App\DataFixtures;

use App\Entity\ClubSubscription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClubSubscriptionFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            
            $subscription = new ClubSubscription([
                "dateSubscription" => $faker->dateTime(),
            ]);
            $manager->persist($subscription);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return([ClubFixture::class, UserFixture::class]);
    }
}
