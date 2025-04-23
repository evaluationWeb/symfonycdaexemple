<?php

namespace App\Controller;

use App\Service\ArticleService;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    public function __construct(
        private readonly ArticleService $articleService
    )
    {}

    #[Route('/article', name: 'app_article_all')]
    public function showAll(): Response
    {   
        try {
            $articles = $this->articleService->getAllArticles();
        } catch (\Exception $th) {
            $articles = null;
        }

        return $this->render('article/articles.html.twig', [
            'articles' => $articles ?? null
        ]);
    }

    #[Route('/article/add', name:'app_article_add')]
    public function addArticle(Request $request) :Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class,$article);
        $form->handleRequest($request);

        return $this->render('article/article_add.html.twig',[
            'form' => $form
        ]);
    }
}
