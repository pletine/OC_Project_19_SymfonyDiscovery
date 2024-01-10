<?php
// src/Controller/LuckyController.php
namespace App\Controller\Blog;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\PostRepository;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        
        return $this->render('blog/homepage.html.twig', [
            'posts' => $posts,
        ]);
    }
}
