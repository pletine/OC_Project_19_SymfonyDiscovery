<?php

namespace App\Controller\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddCommentController extends AbstractController
{
    #[Route('/blog/add/comment', name: 'app_blog_add_comment')]
    public function index(): Response
    {
        return $this->render('blog/add_comment/index.html.twig', [
            'controller_name' => 'AddCommentController',
        ]);
    }
}
