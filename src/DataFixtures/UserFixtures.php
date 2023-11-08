<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $hasher;
    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;

    }



    public function load(ObjectManager $manager): void
    {
        $admin = new User();

        $admin->setUsername( 'Admin');
        $admin->setEmail( 'admin@bucket-list.com');
        $admin->setPassword( $this->hasher->hashPassword($admin, '1234'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setIsVerified( true);
        $manager->persist($admin);

        $john = new User();
        $john->setUsername( 'John');
        $john->setEmail( 'john@doe.fr');
        $john->setPassword( $this->hasher->hashPassword($john, '1234'));
        $john->setIsVerified( true);
        $manager->persist($john);

        $lola = new User();
        $lola->setUsername( 'Lola53');
        $lola->setEmail( 'lola53@orange.fr');
        $lola->setPassword( $this->hasher->hashPassword($lola, '1234'));
        $lola->setIsVerified( true);
        $manager->persist($lola);

        $manager->flush();
    }
}
