<?php

namespace App\Controller\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Comment;

class CommentController extends AbstractController
{
    #[Route('/comment/{id}', name: 'read_comment')]
    public function show(Comment $comment): Response
    {
        $text = 'Test get post: ' . $comment->getAuthor() . '<br>ID = ' . $comment->getId();
        $text .= "<br><a href='/'>Back to homepage</a>";
        return new Response($text);
    }

    #[Route('/newComment', name: 'add_comment')]
    public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $author = $request->request->get('author');
        $comment_text = $request->request->get('comment');
        $post_id = $request->request->get('post_id');

        if(!$author || !$comment_text || !$post_id) {
            return $this->redirectToRoute('homepage');
        }

        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setComment($comment_text);
        $comment->setDate(new \DateTime());

        $post = $entityManager->getRepository('App\Entity\Post')->find($post_id);
        $comment->setPost($post);

        try {
            $entityManager->persist($comment);
            $entityManager->flush();
        } catch (\Exception $e) {
            return new Response('Error: ' . $e->getMessage());
        }

        return $this->redirectToRoute('read_comment', ['id' => $comment->getId()]);
    }

    #[Route('/comment/{id}/delete', name: 'comment_delete')]
    public function delete(Comment $comment, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($comment);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}
