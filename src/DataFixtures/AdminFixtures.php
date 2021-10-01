<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;

class AdminFixtures extends Fixture
{
	private $passwordHasher;

	public function __construct(UserPasswordHasherInterface $passwordHasher)
	{
		$this->passwordHasher = $passwordHasher;
	}

	/**
	 *	Set First Admin user to access CRM
	 *
	 *	@param ObjectManager
	 */
    public function load(ObjectManager $manager): void
	{
		$admin = new User();
		$manager->persist($admin);

		$admin->setUsername('admin')
				->setRoles(['ROLE_ADMIN'])
				->setPassword($this->passwordHasher->hashPassword($admin, 'admin'));

		$manager->flush();
    }
}
