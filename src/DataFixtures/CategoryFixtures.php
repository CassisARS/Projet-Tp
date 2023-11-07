<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      $travel= new Category();
      $travel->setName( 'Travel & Adventures');
      $manager->persist($travel);
      $this->addReference( 'cat-travel', $travel);

        $sport= new Category();
        $sport->setName( 'Sport');
        $manager->persist($sport);
        $this->addReference( 'cat-sport', $sport);

        $entertainments= new Category();
        $entertainments->setName( 'Entertainments');
        $manager->persist($entertainments);
        $this->addReference( 'cat-entertainments', $entertainments);

        $human= new Category();
        $human->setName( 'Human-relations');
        $manager->persist($human);
        $this->addReference( 'cat-human', $human);

        $others= new Category();
        $others->setName( 'Others');
        $manager->persist($others);$this->addReference( 'cat-others', $others);



        $manager->flush();
    }
}
