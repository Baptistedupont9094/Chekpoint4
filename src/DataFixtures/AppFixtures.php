<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // create an admin
        $admin = new User();
        $admin->setlastname('admin');
        $admin->setfirstname('admin');
        $admin->setaddress('admin');
        $admin->setCity('admin');
        $admin->setPostalCode('12345');
        $admin->setPhoneNumber('1234567890');
        $admin->setEmail('admin@admin.com');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);

        $user = new User();
        $user->setlastname('user');
        $user->setfirstname('user');
        $user->setaddress('user');
        $user->setCity('user');
        $user->setPostalCode('12345');
        $user->setPhoneNumber('1234567890');
        $user->setEmail('user@user.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'user'));
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
