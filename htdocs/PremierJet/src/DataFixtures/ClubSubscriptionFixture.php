<?php

namespace App\DataFixtures;

use App\Entity\Club;
use App\Entity\ClubSubscription;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ClubSubscriptionFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create("fr_BE");
        for ($i = 0; $i<20 ; $i++){
            // 1. Propriétés de la classe
            $subscription = new ClubSubscription();
            $subscription->setSubscriptionDate(\DateTimeImmutable::createFromMutable($faker->dateTime()));
            $manager->persist($subscription);
            
            // 2. Obtenir les éléments des classes liées
            
            $repoClubs = $manager->getRepository(Club::class);
            $clubs = $repoClubs->findAll();
            $repoUsers = $manager->getRepository(User::class);
            $users = $repoUsers->findAll();
            
            // 3. Faire le lien avec les autres classes
            foreach($users as $user){
                for($i = 0 ; $i< 5; $i++){
                    $club = $clubs[mt_rand(0,count($clubs)-1)];
                    // $user->addClubSubscription($club);
                    $subscription->setClubSubscripted($this->getReference($club));
                    $subscription->setUserSubscriptor($this->getReference($user));
                }
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return([ClubFixture::class, UserFixture::class]);
    }
}
