<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        RoleFactory::createMany(20);
        ProducterFactory::createMany(20);
        UsersFactory::createMany(20);
        ProductsFactory::createMany(20);
        OrderFactory::createMany(20);
        SubOrderFactory::createMany(20);

    }
}
