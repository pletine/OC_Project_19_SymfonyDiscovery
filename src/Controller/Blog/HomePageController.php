<?php
// src/Controller/LuckyController.php
namespace App\Controller\Blog;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\CommentRepository;
use App\Repository\PostRepository;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(Request $request, PostRepository $postRepository, CommentRepository $commentRepository, EntityManagerInterface $entityManager): Response
    {
        $posts = $postRepository->findAll();
        
        return $this->render('blog/homepage.html.twig', [
            'posts' => $posts,
        ]);
    }
}
