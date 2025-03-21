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
        $faker = Faker\Factory::create();
        for ($i=0; $i <50 ; $i++) { 
            $category = new Category();
            $category->setLabel($faker->unique()->word(1));
           
            $manager->persist($category);
  
    
        }
        $manager->flush();
    }
}
