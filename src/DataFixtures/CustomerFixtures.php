<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Customer;
use Faker;

class CustomerFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		$faker = Faker\Factory::create('fr_FR');

		$customers = [];
		for ($i=0; $i<30; $i++) {
			$customers[$i] = new Customer();
			$customers[$i]->setFirstName($faker->firstName)
							->setLastName($faker->unique()->lastNAme)
							->setMail($faker->unique()->email)
							->setLastMailOn($faker->dateTime($max = 'now'))
							->setHasAnswered($faker->boolean)
							->setHasConsumed($faker->boolean);

			$manager->persist($customers[$i]);
		}

		$manager->flush();
    }
}
