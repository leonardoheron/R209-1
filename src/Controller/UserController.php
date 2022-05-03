<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
	/**
     * @Route("/createUser", name="create_User")
     */
	public function createUser(Request $request, EntityManagerInterface $manager): Response
	{
		//Récupération variables de formulaire
		$email = $request->request->get('email');
		$pwd = $request->request->get('pwd');
		//$roles = $request->request->get('roles');
		$nom = $request->request->get('nom');
		$prenom = $request->request->get('prenom');
		$adresse = $request->request->get('adresse');
		$cp = $request->request->get('cp');
		$ville = $request->request->get('ville');
		$telephone = $request->request->get('telephone');
		$type = $request->request->get('type');
		$civilite = $request->request->get('civilite');
		//Création d'un nouvel objet
		$user = new user();
		//Insertion de la valeur dans l'objet
		$user->setNom($nom);
		$user->setPrenom($prenom);
		$user->setEmail($email);
		$user->setPassword($pwd);
		//$user->setRoles($roles);
		$user->setAdresse($adresse);
		$user->setCP($cp);
		$user->setVille($ville);
		$user->setTelephone($telephone);
		$user->setType($type);
		$user->setCivilite($civilite);
		//Insertion en base des relations
		//Validation en BD
		$manager->persist($user);
		$manager->flush();
		return $this->redirectToRoute('user');
	}
	
}
