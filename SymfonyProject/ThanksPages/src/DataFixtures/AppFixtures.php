<?php

namespace App\DataFixtures;
use DateTime;
use App\Entity\User;
use App\Entity\Thanks;
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

        $thanks1 = new Thanks();
        $thanks1->setTksBy($user1);
        $thanks1->setText('merci de m\'avoir aidé auprès du client Spatio');
        $thanks1->setTksFor($user3);
        $dateTimeFixture1 = new DateTime('2024-11-01 10:00:00');
        $thanks1->setTkDate($dateTimeFixture1);

        $thanks2 = new Thanks();
        $thanks2->setTksBy($user5);
        $thanks2->setText('merci pour la bonne humeur que tu as tout les jours ');
        $thanks2->setTksFor($user4);
        $dateTimeFixture2= new DateTime('1999-03-01 08:00:00');
        $thanks2->setTkDate($dateTimeFixture2);

        $thanks3 = new Thanks();
        $thanks3->setTksBy($user6);
        $thanks3->setText('merci pour tes explications, elles m\'ont permis de gagner beaucoup de temps');
        $thanks3->setTksFor($user2);
        $dateTimeFixture3= new DateTime('2024-11-19 16:00:00');
        $thanks3->setTkDate($dateTimeFixture3);

        $manager->persist($thanks1);
        $manager->persist($thanks2);
        $manager->persist($thanks3);
        
        $manager->flush();
    }
}
