<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $categories = ['Action', 'Comédie', 'Science-fiction', 'Drame'];
        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
        }
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName($faker->unique()->word());
            $manager->persist($category);
        }

        $manager->flush();
    }
}
