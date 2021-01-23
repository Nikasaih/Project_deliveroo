<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Entity\User;
use App\Form\RestaurantType;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant_gestion", name="restaurant_gestion")
     */
    public function index(): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'controller_name' => 'RestaurantController'
        ]);
    }

    /**
     * @Route("/restaurant_gestion/create", name="restaurant_gestion_create")
     * @Route("/restaurant_gestion/{id}/edit", name="restaurant_gestion_edit")
     */
    public function resto_Edit(Request $request, Restaurant $restaurant = null,  EntityManagerInterface $manager): Response
    {

        if (!$restaurant) {
            $restaurant = new Restaurant();
        }
        $form = $this->createForm(RestaurantType::class, $restaurant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) /*permet de verifier si le formulaire est bon et d'ensuite faire les maneuvre sur la bdd*/ {
            if (!$restaurant->getId()) {
                $restaurant->setUser($this->get('security.token_storage')->getToken()->getUser());
            }
            $manager->persist($restaurant);
            $manager->flush();

            return $this->redirectToRoute('restaurant', ['id' => $restaurant->getId()]);
        }

        return $this->render('restaurant/edit.html.twig', [
            'controller_name' => 'RestaurantController',
            'form' => $form->createView(),
            'editMode' => $restaurant->getId() !== null
        ]);
    }
}
