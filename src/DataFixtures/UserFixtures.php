<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $adult = (new User())
            ->setEmail('adult_user@example.com')
            ->setBirthdate(new \DateTimeImmutable('1990-12-08'))
        ;
        $adult->setPassword(
            $this->userPasswordHasher->hashPassword($adult, 'pass'),
        );
        $manager->persist($adult);

        $child = (new User())
            ->setEmail('child_user@example.com')
            ->setBirthdate(new \DateTimeImmutable('2013-06-12'))
        ;
        $child->setPassword(
            $this->userPasswordHasher->hashPassword($child, 'pass'),
        );
        $manager->persist($child);

        $teen = (new User())
            ->setEmail('teen_user@example.com')
            ->setBirthdate(new \DateTimeImmutable('2006-11-14'))
        ;
        $teen->setPassword(
            $this->userPasswordHasher->hashPassword($teen, 'pass'),
        );
        $manager->persist($teen);

        $admin = (new User())
            ->setEmail('admin@example.com')
            ->setBirthdate(new \DateTimeImmutable('1985-12-11'))
        ;
        $admin->setPassword(
            $this->userPasswordHasher->hashPassword($admin, 'pass'),
        );
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $manager->flush();
    }
}
