<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (range(1, 10) as $i) {
            $category = new Category();
            $category->setName('Category' . $i);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category);
        }


        $manager->flush();
    }
}
