<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Entity\Company;
use Faker;


class UserCompanyFixtures extends Fixture
{
    private $passwordHasher;

	public function __construct(UserPasswordHasherInterface $passwordHasher)
	{
		$this->passwordHasher = $passwordHasher;
	}

    public function load(ObjectManager $manager): void
    {
		$faker = Faker\Factory::create('fr_FR');

		$users = [];
		for ($i=0; $i<20; $i++) {
			$users[$i] = new User();
			$users[$i]->setUsername($faker->unique()->userName)
						->setPassword($this->passwordHasher->hashPassword($users[$i], $faker->password));
			$manager->persist($users[$i]);
		}

		$companies = [];
		for ($i=0; $i<10; $i++) {
			$companies[$i] = new Company();
			$companies[$i]->setName($faker->unique()->word);
			$manager->persist($companies[$i]);
		}

		// associate 2 users per company
		for ($i=0; $i<10; $i++) {
			$users[$i*2]->setIdCompany($companies[$i]);
			$manager->persist($users[$i*2]);

			$users[($i*2)+1]->setIdCompany($companies[$i]);
			$manager->persist($users[($i*2)+1]);

			// set company supervisor
			$companies[$i]->setIdSupervisor($users[$i*2]);
			$manager->persist($companies[$i]);
		}

		$manager->flush();
	}
}
