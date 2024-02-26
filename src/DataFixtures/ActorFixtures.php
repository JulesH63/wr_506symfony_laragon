<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Person as PersonProvider;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $faker->addProvider(new PersonProvider($faker));

        for ($i = 0; $i < 20; $i++) {
            $actor = new Actor();
            $actor->setFirstName($faker->firstName);
            $actor->setLastName($faker->lastName);
            $manager->persist($actor);
        }

        $manager->flush();
    }
}