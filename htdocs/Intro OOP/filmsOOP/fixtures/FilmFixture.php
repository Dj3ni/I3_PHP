<?php

include("./classes/Film.php");
include("./classes/FilmManager.php");


use Faker\Factory;

class FilmFixture {

    public function launchFixtures(){

        $faker= Factory::create('fr_BE');

        for ($i = 0; $i<=10 ; $i++){
            $film = new Film([
                "title"=> $faker->sentence(3),
                "synopsis"=> $faker->paragraph(),
                "duration"=> rand(30,300),
                "dateParution"=> $faker->dateTime(),
                "image" => $faker->imageUrl(640, 480, 'animals', true),
            ]);

            $fm = new FilmManager();
            $fm->insert($film);
        }

    }
}