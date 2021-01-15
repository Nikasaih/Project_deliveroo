<?php

namespace App\DataFixtures;

use App\Entity\Plat;
use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 0; $i < 3; $i++) {
            $restaurant = new Restaurant();
            $restaurant->setNomRestaurant("nom du resto $i")
                ->setLocalisation("localisaiton du resto $i")
                ->setListAllergene("http://placehold.it/350x150")
                ->setInfosComplementaire("info complémentaire resto : $i")
                ->setHoraireOuverture("horraire ouverture resto : $i");
            $manager->persist($restaurant);
            for ($j = 0; $j < 4; $j++) {
                $plat = new Plat();
                $plat->setNomPlat("nom plat $i")
                    ->setNote(rand(0, 5))
                    ->setPrixUnit(rand(7, 20))
                    ->setRestaurant($restaurant);
                $manager->persist($plat);
            }
        }



        $manager->flush();
    }
}
