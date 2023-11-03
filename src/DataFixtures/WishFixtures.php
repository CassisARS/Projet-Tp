<?php

namespace App\DataFixtures;

use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WishFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $wish1 = new Wish();
        $wish1->setTitle('Sauter en parachute');
        $wish1->setAuthor('Cassandra');
        $wish1->setDescription('je souhaiterai beaucoup faire ça!');
        $wish1->setIsPublished(true);
        $wish1->setDateCreated(new \DateTime('-1 month'));
        $manager->persist($wish1);

        $wish2 = new Wish();
        $wish2->setTitle('Visiter New-york');
        $wish2->setAuthor('Camille');
        $manager->persist($wish2);

        $wish3 = new Wish();
        $wish3->setTitle('Gagner le prix de pâtisserie');
        $wish3->setAuthor('Lucie');
        $wish3->setIsPublished(true);
        $manager->persist($wish3);


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
