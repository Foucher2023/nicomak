<?php

namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $user1 = new User();
        $user1->setName("Myriam");
        $user1->setPassword("MyMy01");
        $user1->setImg("avatar_myriam.png");

        $user2 = new User();
        $user2->setName("Geoffroy");
        $user2->setPassword("GeGe02");
        $user2->setImg("avatar_geoffroy.png");

        $user3 = new User();
        $user3->setName("Laura");
        $user3->setPassword("LaLa03");
        $user3->setImg("avatar_laura.png");

        $user4 = new User();
        $user4->setName("Céline");
        $user4->setPassword("CeCe04");
        $user4->setImg("avatar_myriam.png");

        $user5 = new User();
        $user5->setName("Alice");
        $user5->setPassword("AlAl05");
        $user5->setImg("avatar_alice.png");

        $user6 = new User();
        $user6->setName("Laetitia");
        $user6->setPassword("LaLa06");
        $user6->setImg("avatar_Laetitia.png");
        
        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($user6);












        
        $manager->flush();
    }
}
