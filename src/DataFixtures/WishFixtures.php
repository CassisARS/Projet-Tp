<?php

namespace App\DataFixtures;

use App\Entity\Wish;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class WishFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $travel = $this->getReference( 'cat-travel');
        $sport = $this->getReference( 'cat-sport');
        $entertainments = $this->getReference( 'cat-entertainments');
        $human = $this->getReference( 'cat-human');
        $others = $this->getReference( 'cat-others');


        $wish1 = new Wish();
        $wish1->setTitle('Sauter en parachute');
        $wish1->setAuthor('Cassandra');
        $wish1->setDescription('je souhaiterai beaucoup faire ça!');
        $wish1->setIsPublished(true);
        $wish1->setDateCreated(new \DateTime('-1 month'));
        $wish1->setCategory($sport);
        $manager->persist($wish1);

        $wish2 = new Wish();
        $wish2->setTitle('Visiter New-york');
        $wish2->setAuthor('Camille');
        $wish2->setCategory($travel);
        $manager->persist($wish2);

        $wish3 = new Wish();
        $wish3->setTitle('Gagner le prix de pâtisserie');
        $wish3->setAuthor('Lucie');
        $wish3->setIsPublished(true);
        $wish3->setCategory($others);
        $manager->persist($wish3);


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
           CategoryFixtures::class
        ];
    }
}
