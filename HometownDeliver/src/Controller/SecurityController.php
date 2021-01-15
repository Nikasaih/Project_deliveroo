<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security_login", name="login")
     */
    public function login(): Response
    {
        return $this->render('security/login.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }

    /**
     * @Route("/security_register", name="register")
     */
    public function register(): Response
    {
        return $this->render('security/register.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
    /**
     * @Route("/security_logout", name="logout")
     */
    public function logout(): Response
    {
        return $this->render('security/logout.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
}
