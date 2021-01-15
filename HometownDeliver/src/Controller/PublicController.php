<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render(('public/home.html.twig'));
    }

    /**
     * @Route("/plat", name="plat")
     */
    public function plat()
    {
        return $this->render(('public/plat.html.twig'));
    }

    /**
     * @Route("/restaurant", name="restaurant")
     */
    public function restaurant()
    {
        return $this->render(('public/restaurant.html.twig'));
    }


    /**
     * @Route("/userProfil", name="userProfil")
     */
    public function userProfil()
    {
        return $this->render(('public/userProfil.html.twig'));
    }
}
