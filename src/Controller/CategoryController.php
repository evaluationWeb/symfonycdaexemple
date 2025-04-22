<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository
    )
    {}

    #[Route('/categories', name: 'app_category_all')]
    public function showAll(): Response
    {
        $categories = $this->categoryRepository->findAll();

        return $this->render('category/categories.html.twig', [
            'categories' => $categories,
        ]);
    }
}
