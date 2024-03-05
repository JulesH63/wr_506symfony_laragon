<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Nationality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Obtient toutes les références de nationalité
        $nationalities = [];
        for ($i = 1; $i <= 10; $i++) {
            $nationalities[] = $this->getReference('nationality_' . $i);
        }

        for ($i = 1; $i <= 10; $i++) {
            $actor = new Actor();
            $actor->setFirstName($faker->firstName);
            $actor->setLastName($faker->lastName);
            // Attribue une nationalité aléatoire à chaque acteur
            $randomIndex = array_rand($nationalities); // Choix aléatoire d'une nationalité parmi les références existantes
            $actor->setNationality($nationalities[$randomIndex]);

            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            NationalityFixtures::class,
        ];
    }
}
