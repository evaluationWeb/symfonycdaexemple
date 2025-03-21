<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExempleController extends AbstractController
{
    #[Route('/exemple', name: 'app_exemple_index')]
    public function index(): Response
    {
        return $this->render('exemple/index.html.twig', [
           'article' => "test"
        ]);
    }
}
