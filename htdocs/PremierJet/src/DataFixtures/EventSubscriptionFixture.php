<?php

namespace App\DataFixtures;

use App\Entity\EventSubscription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EventSubscriptionFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            
            $subscription = new EventSubscription([
                "dateSubscription" => $faker->dateTime(),
            ]);
            $manager->persist($subscription);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return([EventFixture::class, UserFixture::class]);
    }
}
