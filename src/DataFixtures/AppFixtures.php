<?php
// // src/DataFixtures/AppFixtures.php

// namespace App\DataFixtures;

// use Doctrine\Bundle\FixturesBundle\Fixture;
// use Doctrine\Persistence\ObjectManager;
// use App\Entity\Actor;

// class AppFixtures extends Fixture
// {
//     public function load(ObjectManager $manager)
//     {
//         $actor = new Actor();
//         $actor->setLastname('DOE');
//         $actor->setFirstname('John');
// 		[...]
//         $manager->persist($actor);
//         $manager->flush();
//         $user = new User();
//         $manager->persist($user);
//         $this->addReference('user-john', $user);

//         $post = new Post();
//         $post->setTitle('My First Post');
//         $post->setUser($this->getReference('user-john'));

//         $manager->persist($post);
//     }
// }