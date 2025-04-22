<?php

namespace App\Service;

use App\Repository\ArticleRepository;

class ArticleService
{
    public function __construct(
        private readonly ArticleRepository $articleRepository
    )
    {}
    
    public function getAllArticles() :array
    {
        try {
            //Récupération de la liste des articles
            $articles = $this->articleRepository->findAll();
            //Test si la liste est vide
            if($this->articleRepository->count() == 0) {
                throw new \Exception("La liste est vide");
            }

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        //Retourner la liste si non vide
        return $articles;
    }

}