<?php
// src/Controller/LuckyController.php
namespace App\Controller\Blog;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\CommentRepository;
use App\Repository\PostRepository;

class HomePageController extends AbstractController
{
    

    #[Route('/')]
    public function homepage(PostRepository $postRepository, CommentRepository $commentRepository): Response
    {
        $user = new \stdClass();
        $user->connected = true;
        $user->name = 'John Doe';

        $posts = $postRepository->findAll();
        $comments = $commentRepository->findAll();
        return $this->render('blog/homepage.html.twig', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments,
        ]);
    }
}
