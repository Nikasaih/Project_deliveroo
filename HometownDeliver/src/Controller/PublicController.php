<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function plat(PlatRepository $repo)
    {


        return $this->render('public/plat.html.twig', [
            "plats" => $repo->findAll(),
        ]);
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



    /**
     * @Route("/search", name="search")
     */
    public function search(Request $request, RestaurantRepository $restoRepo, PlatRepository $platRepo)
    {
        if ($request->request->count() > 0) {
            return $this->render('public/search_result.html.twig', [
                "Ville" => $request->request->get("Ville"),
                "Restaurant" => $request->request->get("Restaurant"),
                "Plat" => $request->request->get("Plat"),
                "restoRepo" => $restoRepo->findAll(),
                "platRepo" => $platRepo->findAll()
            ]);
        }
        return $this->render('public/search_result.html.twig');
    }
}
