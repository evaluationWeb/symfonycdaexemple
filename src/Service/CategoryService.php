<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    )
    {}

    public function getAllCategories() :array{
        try {
            //Récupération des categories
            $categories = $this->categoryRepository->findAll();
            //Tester si la liste est vide
            if($this->categoryRepository->count() == 0) {
                //lever une exception personnalisée
                throw new \Exception("La liste des catégories est vide");
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        //Retourne la liste des catègories
        return $categories;
    }
}