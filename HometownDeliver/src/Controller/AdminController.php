<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     *  @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     *  @Route("/admin/resto", name="resto_admin")
     */
    public function resto_admin(RestaurantRepository $repo): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            "restaurants" => $repo->findAll()
        ]);
    }

    /**
     *  @Route("/admin/plat", name="plat_admin")
     */
    public function plat_admin(PlatRepository $repo): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            "plats" => $repo->findAll()
        ]);
    }

    /**
     *  @Route("/admin/user", name="user_admin")
     */
    public function user_admin(UserRepository $repo): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            "users" => $repo->findAll()
        ]);
    }


    /**
     * @Route("/admin/user/{id}", name="admin_user_set")
     */
    public function user_set(User $user, Request $request, EntityManagerInterface $manager)
    {

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) /*permet de verifier si le formulaire est bon et d'ensuite faire les maneuvre sur la bdd*/ {

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/user_edit.html.twig', [
            'controller_name' => 'RestaurantController',
            'form' => $form->createView(),
        ]);
    }
}
