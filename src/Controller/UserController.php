<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;

class UserController extends AbstractController
{
	/*
	 * @UserRepository
	 */
	private $repository;

	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;	
	}

    /**
     * @Route("/user", name="user")
     */
    public function index(): Response
    {
		$users = $this->repository->findAll();
		return $this->render('user/index.html.twig', [
			'users' => $users,
		]);
	}

	/**
	 * @Route("/user/edit", name="user.edit")
	 */
	public function edit(User $user)
	{
		return $this->render('user/edit.html.twig', [
			'user' => $user,
		]);
	}

}
