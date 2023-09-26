<?php

// src/DataFixtures/MovieFixtures.php
namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Création de catégories
        $categories = ['Action', 'Comédie', 'Science-fiction', 'Drame'];

        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);

            // Création de films
            for ($i = 1; $i <= 10; $i++) {
                $movie = new Movie();
                $movie->setTitle("$categoryName Movie $i");
                $movie->setDescription("La catégorie du film est : $categoryName Movie $i");
                $movie->setReleaseDate('2022-09-30');
                $movie->setDuration('2h');
                $movie->setCategory($category);

                $manager->persist($movie);
            }
        }

        $manager->flush();
    }
}
