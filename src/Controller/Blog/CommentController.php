<?php

namespace App\Controller\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Comment;

class CommentController extends AbstractController
{
    #[Route('/blog/comment', name: 'app_blog_comment')]
    public function index(): Response
    {
        return $this->render('homepage');
    }

    #[Route('/comment/{id}', name: 'read_comment')]
    public function show(Comment $comment): Response
    {
        return new Response('Test get post: ' . $comment->getAuthor() . '<br>ID = ' . $comment->getId());
    }

    #[Route('/comment/{PostId}', name: 'add_comment')]
    public function add(Comment $comment, EntityManagerInterface $entityManager): Response
    {
        $entityManager->persist($comment);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }

    #[Route('/comment/{id}/delete', name: 'comment_delete')]
    public function delete(Comment $comment, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($comment);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}
