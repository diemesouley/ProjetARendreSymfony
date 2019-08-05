<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SuperAdmin extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder=$passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user = new User();
            $user->setUsername('Souleymane');
            $user->setPassword($this->passwordEncoder->encodePassword($user, 'DIEME'));
            $user->setRoles(['ROLE_SUPER_ADMIN']);
            $user->setMatriculeUser('U1');
            $user->setNomUser('DIEME');
            $user->setPrenomUser('SOULEY');
            $user->setEmailUser('diemesouley@gmail.com');
            $user->setAdresseUser('keur mbaye fall');
            $user->setTelephoneUser(771208795);
            $user->setStatusUser('Active');
            $manager->persist($user);
            $manager->flush();
            
    }
}
