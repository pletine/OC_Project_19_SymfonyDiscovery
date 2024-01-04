<?php

namespace App\Controller\Blog;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Form\PostType;

class PostController extends AbstractController
{
    // #[Route('/post', name: 'create_post')]
    // public function createPost(EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    // {
    //     $post = new Post();
    //     $post->setTitle('My first post');
    //     $post->setStory('This is my first post on my new blog!');
    //     $post->setPublishDate(new \DateTime());

    //     $errors = $validator->validate($post);
    //     if (count($errors) > 0) {
    //         return new Response((string) $errors, 400);
    //     } else {
    //         $entityManager->persist($post);
    //         $entityManager->flush();

    //         return new Response("Saved new post with id {$post->getId()}");
    //     }
    // }

    #[Route('/post/new', name: 'new_post')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $post = new Post();
        // $post->setTitle('Ex: Ma journée du ?');
        // $post->setStory('Ex: Les évènements marquants de ma journée');
        // $post->setPublishDate(new \DateTime());

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
    // public function show(PostRepository $postRepository, int $id): Response
    // {
    //     // $post = $entityManager->getRepository(Post::class)->find($id);
    //     // if (!$post) {
    //     //     throw $this->createNotFoundException(
    //     //         'No post found for id ' . $id
    //     //     );
    //     // }
    //     // return new Response('Check out this great post: ' . $post->getTitle());

    //     $post = $postRepository->findPostById($id);
    //     if (!$post) {
    //         throw $this->createNotFoundException(
    //             'No post found for id ' . $id
    //         );
    //     }

    //     return new Response('Check out this great post: ' . $post->getTitle());
    // }
    public function show(Post $post): Response
    {
        return new Response('Test get post: ' . $post->getTitle() . '<br>ID = ' . $post->getId());
    }

    #[Route('/post/{id}/delete', name: 'post_delete')]
    public function delete(Post $post, EntityManagerInterface $entityManager): Response
    {
        foreach ($post->getComments() as $comment) {
            $entityManager->remove($comment);
        }
        $entityManager->remove($post);

        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }
}
