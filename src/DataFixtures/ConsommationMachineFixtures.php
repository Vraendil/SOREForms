<?php

namespace App\DataFixtures;

use App\Entity\ConsommationMachine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ConsommationMachineFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ( $i = 1; $i <= 10; $i++ ) {
            $machine = new ConsommationMachine();
            $machine
                ->setLabel('Machine#'.$i)
                ->setType(random_int(0, 1) === 0 ? 'engin' : 'vehicule');

            $manager->persist($machine);
        }

        $manager->flush();
    }
}
