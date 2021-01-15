<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(RestaurantRepository $repo)
    {
        return $this->render('public/home.html.twig', [
            "restaurants" => $repo->findAll()
        ]);
    }

    /**
     * @Route("/plat", name="plat")
     */
    public function plat()
    {
        return $this->render(('public/plat.html.twig'));
    }

    /**
     * @Route("/restaurant/{id}", name="restaurant")
     */
    public function restaurant(RestaurantRepository $repo, $id)
    {

        return $this->render('public/restaurant.html.twig', [
            "resto" => $repo->find($id)
        ]);
    }


    /**
     * @Route("/userProfil", name="userProfil")
     */
    public function userProfil()
    {
        return $this->render(('public/userProfil.html.twig'));
    }
}
