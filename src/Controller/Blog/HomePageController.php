<?php
// src/Controller/LuckyController.php
namespace App\Controller\Blog;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Repository\CommentRepository;
use App\Repository\PostRepository;

use App\Entity\Comment;
use App\Form\CommentType;

class HomePageController extends AbstractController
{
    #[Route('/', name: "homepage")]
    public function homepage(PostRepository $postRepository, CommentRepository $commentRepository): Response
    {
        $user = new \stdClass();
        $user->connected = false;
        $user->name = 'John Doe';

        $comment = new Comment();


        $forms = [];
        $posts = $postRepository->findAll();
        foreach ($posts as $post) {
            $form = $this->createForm(CommentType::class, $comment);
            $forms[$post->getId()] = $form->createView();

            if ($form->isSubmitted() && $form->isValid()) {
                $comment = $form->getData();
                $comment->setPost($post);
                $comment->setPublishDate(new \DateTime());

                // $entityManager = $this->getDoctrine()->getManager();
                // $entityManager->persist($comment);
                // $entityManager->flush();

                return $this->redirectToRoute('homepage');
            }
        }

        $comments = $commentRepository->findAll();
        return $this->render('blog/homepage.html.twig', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments,
            'formsComment' => $forms,
        ]);
    }
}
