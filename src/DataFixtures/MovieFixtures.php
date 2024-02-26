<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Movie as MovieProvider;
use Xylis\FakerCinema\Provider\Person as PersonProvider;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->addProvider(new MovieProvider($faker));
        $faker->addProvider(new PersonProvider($faker));

        for ($i = 0; $i < 100; $i++) {
            $movie = new Movie();
            $movie->setTitle($faker->movie);
            $movie->setRuntime($faker->numberBetween(60, 240));

            $randomImage = "https://picsum.photos/200/300?random=" . $i;
            $movie->setImage($randomImage);

            $movie->setDirector($faker->director);
            $actors = $faker->actors(2);
            foreach ($actors as $actorName) {
                $movie->addActor($actorName);
            }

            $genres = $faker->movieGenres();
            $movie->setGenre($genres[array_rand($genres)]);
            $movie->setReleaseYear($faker->numberBetween(1950, 2022));
            $manager->persist($movie);
        }

        $manager->flush();
    }
}
