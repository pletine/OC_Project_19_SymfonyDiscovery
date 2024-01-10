<?php

namespace App\Controller\Blog;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\PostType;

class PostController extends AbstractController
{
    #[Route('/post/new', name: 'new_post')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $post->setPublishDate(new \DateTime());

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('blog/postForm.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/post/{id}', name: 'read_post')]
    public function show(Post $post, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $post->setPublishDate(new \DateTime());

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('blog/postForm.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/post/{id}/delete', name: 'post_delete')]
    public function delete(Post $post, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        foreach ($post->getComments() as $comment) {
            $entityManager->remove($comment);
        }
        $entityManager->remove($post);

        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}
