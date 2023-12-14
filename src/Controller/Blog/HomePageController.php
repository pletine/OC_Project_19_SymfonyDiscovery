<?php
// src/Controller/LuckyController.php
namespace App\Controller\Blog;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// ...

class HomePageController extends AbstractController
{
    #[Route('/blog')]
    public function homepage(): Response
    {
        return $this->render('blog/homepage.html.twig', [
            
        ]);
    }
}