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

use App\Entity\Comment;
use App\Form\CommentType;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(Request $request, PostRepository $postRepository, CommentRepository $commentRepository, EntityManagerInterface $entityManager): Response
    {
        $user_connected = $request->getSession()->get('user_connected');

        $forms = [];
        $posts = $postRepository->findAll();
        foreach ($posts as $post) {
            $comment = new Comment();
            $form = $this->createForm(CommentType::class, $comment);
            $form->handleRequest($request);
            $forms[$post->getId()] = $form->createView();

            if ($form->isSubmitted() && $form->isValid()) {
                $comment = $form->getData();
                $comment->setPost($post);
                $comment->setDate(new \DateTime());

                $entityManager->persist($comment);
                $entityManager->flush();

                return $this->redirectToRoute('read_comment', ['id' => $comment->getId()]);
            }
        }

        $comments = $commentRepository->findAll();
        return $this->render('blog/homepage.html.twig', [
            'posts' => $posts,
            'comments' => $comments,
            'formsComment' => $forms,
            'user_connected' => $user_connected,
        ]);
    }
}
