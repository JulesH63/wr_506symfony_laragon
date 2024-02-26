<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Movie as MovieProvider;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->addProvider(new MovieProvider($faker));

        // Générer 100 films
        for ($i = 0; $i < 100; $i++) {
            $movie = new Movie();
            $movie->setTitle($faker->movie);
            $movie->setRuntime($faker->runtime); // Utilisez la durée du film au lieu de la date de sortie

            $manager->persist($movie);
        }

        $manager->flush();
    }
}