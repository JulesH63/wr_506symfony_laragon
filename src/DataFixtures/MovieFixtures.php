<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR'); // Crée un générateur Faker pour le français

        foreach (range(1, 40) as $i) {
            $movie = new Movie();
            $movie->setTitle($faker->sentence(3)); // Génère un titre aléatoire de 3 mots
            $releaseDate = $faker->dateTimeBetween('-30 years', 'now')->format('Y-m-d');
            $movie->setReleaseDate($releaseDate);
            $movie->setruntime($faker->numberBetween(60, 180)); // Génère une durée aléatoire entre 60 et 180
            $movie->setDescription($faker->paragraph(5)); // Génère un paragraphe de 5 phrases pour le synopsis
            $movie->setCategory($this->getReference('category_' . rand(1, 10)));

            // we add four actors to each movie
            for ($j = 1; $j <= 4; $j++) {
                $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            }
            $manager->persist($movie);
            $this->addReference('movie_' . $i, $movie);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
