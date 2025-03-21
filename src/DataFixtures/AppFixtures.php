<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Instancier Faker
        $faker = Faker\Factory::create("fr_FR");
        
        //Boucle pour ajouter 50 catégories
        for ($i=0; $i < 200 ; $i++) { 
            $category = new Category();
            //Setter le label avec un métier aléatoire
            $category->setLabel($faker->unique()->jobTitle());
            //Mettre en cache la catégorie
            $manager->persist($category);
        }
        //Synchroniser avec la BDD
        $manager->flush();
    }
}
