<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $createdUsers  = [];

        foreach (range(1, 10) as $number) {
            $testUser = new User(Uuid::uuid4());

            $testUser->setUsername('testuser' . $number);
            $testUser->setPassword('tu' . $number . 'pwd');
            $testUser->setCanLogin(false);

            $createdUsers[] = $testUser->getUsername();
            $manager->persist($testUser);
        }

        dump($createdUsers);
        $manager->flush();
    }
}
