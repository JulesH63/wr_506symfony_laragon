<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Nationality;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nationalities = ['Français', 'Anglais', 'Espagnol', 'Italien', 'Japonais', 'Norvégien', 'Américain', 'Mexicain', 'Algérien', 'Marocain'];
        
        foreach ($nationalities as $key => $name) {
            $nationality = new Nationality();
            $nationality->setName($name);
            $manager->persist($nationality);
            $this->addReference('nationality_' . ($key + 1), $nationality);
        }

        $manager->flush();
    }
}
