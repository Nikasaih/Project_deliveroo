<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Entity\Restaurant;
use App\Entity\User;
use App\Form\PlatType;
use App\Form\RestaurantType;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RestaurantController extends AbstractController
{

    //RESTAURANT -------------------------------
    /**
     * @Route("/restaurant_gestion", name="restaurant_gestion")
     */
    public function index(): Response
    {
        return $this->render('restaurant/indexMesResto.html.twig', [
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


            $file = $restaurant->getListAllergene();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);
            $restaurant->setListAllergene($fileName);

            $file = $restaurant->getPhoto();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);
            $restaurant->setPhoto($fileName);

            $manager->persist($restaurant);
            $manager->flush();

            return $this->redirectToRoute('restaurant', ['id' => $restaurant->getId()]);
        }

        return $this->render('restaurant/create_edit_resto.html.twig', [
            'controller_name' => 'RestaurantController',
            'form' => $form->createView(),
            'editMode' => $restaurant->getId() !== null
        ]);
    }

    /**
     * @Route("/restaurant_gestion/{id}delete", name="restaurant_gestion_delete")
     */
    public function resto_delete(Restaurant $restaurant, EntityManagerInterface $manager)
    {
        $manager->remove($restaurant);
        $manager->flush();

        return $this->redirectToRoute('restaurant_gestion');
    }


    //PLATS -------------------------------


    /**
     * @Route("/restaurant_gestion/{id}/plat", name="restaurant_gestion_plat")
     */
    public function indexPlat(Restaurant $restaurant): Response
    {
        return $this->render('restaurant/indexPlats.html.twig', [
            'controller_name' => 'RestaurantController',
            'resto' => $restaurant
        ]);
    }


    /**
     * @Route("/restaurant_gestion/{resto}/plat/create", name="plat_gestion_create")
     * @Route("/restaurant_gestion/{resto}/{id}/plat/edit", name="plat_gestion_edit")
     * @ParamConverter("restaurant", options={"id" = "resto"})
     */
    public function plat_Edit(Request $request, Restaurant $restaurant, Plat $plat = null,  EntityManagerInterface $manager): Response
    {

        if (!$plat) {
            $plat = new Plat();
        }

        $form = $this->createForm(PlatType::class, $plat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) /*permet de verifier si le formulaire est bon et d'ensuite faire les maneuvre sur la bdd*/ {
            if (!$plat->getId()) {
                $plat->setRestaurant($restaurant);
            }


            $file = $plat->getPhoto();
            $fileName = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('upload_directory'), $fileName);
            $plat->setPhoto($fileName);



            $manager->persist($plat);
            $manager->flush();

            return $this->redirectToRoute('restaurant_gestion_plat', ['id' => $restaurant->getId()]);
        }

        return $this->render('restaurant/create_edit_plat.html.twig', [
            'controller_name' => 'RestaurantController',
            'form' => $form->createView(),
            'editMode' => $plat->getId() !== null
        ]);
    }

    /**
     * @Route("/restaurant_gestion/{resto}/{id}/plat/delete", name="plat_gestion_delete")
     * 
     * @ParamConverter("restaurant", options={"id" = "resto"})
     */
    public function plat_delete(Plat $plat, Restaurant $restaurant, EntityManagerInterface $manager)
    {
        $manager->remove($plat);
        $manager->flush();

        return $this->redirectToRoute('restaurant_gestion_plat', ['id' => $restaurant->getId()]);
    }
}
