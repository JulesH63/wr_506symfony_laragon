<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création d'acteurs
        $actorsData = [
            ['Tom', 'Hanks'],
            ['Brad', 'Pitt'],
            ['Meryl', 'Streep'],
            ['Leonardo', 'DiCaprio'],
        ];

        foreach ($actorsData as $actorData) {
            $actor = new Actor();
            $actor->setFirstName($actorData[0]);
            $actor->setLastName($actorData[1]);
            $manager->persist($actor);
        }

        $manager->flush();
    }
}
