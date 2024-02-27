<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;
use Faker\Factory;
use Xylis\FakerCinema\Provider\Person as PersonProvider;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR'); // Crée un générateur Faker pour le français

        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName($faker->firstName);
            $actor->setLastName($faker->lastName);
            
            // Ajouter d'autres propriétés d'acteur si nécessaire, par exemple :
            // $actor->setNationality($this->getReference('nationality_' . rand(1, 9)));

            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            // Si vous avez des dépendances pour ces fixations, vous pouvez les ajouter ici.
        ];
    }
}
