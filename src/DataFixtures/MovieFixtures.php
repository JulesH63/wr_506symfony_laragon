<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Movie as MovieProvider;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $faker->addProvider(new MovieProvider($faker));

        foreach (range(1, 40) as $i) {
            $movie = (new Movie())
                ->setTitle($faker->unique()->movie)
                ->setDescription($faker->text(200))
                ->setDuration(rand(100, 250))
                ->setReleaseDate($faker->dateTimeBetween('-50 years', 'now'))
                ->setCategory($this->getReference('category_' . rand(1, 15)));

            for ($j = 1; $j <= rand(2, 28); $j++) {
                $movie->addActor($this->getReference('actor_' . rand(1, 25)));
            }
            
            $manager->persist($movie);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}