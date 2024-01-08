<?php

namespace App\Controller\Blog;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\User;
use App\Form\NewUserType;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $last_email = $authenticationUtils->getLastUsername();

        if ($error) {
            $this->addFlash('error', 'Email or password is incorrect');
            $session = $request->getSession();
        } else {
            $session = $request->getSession();
            $session->set("user_connected", true);
        }

        return $this->render('blog/login.html.twig', [
            'last_email' => $last_email,
            'error' => $error,
        ]);
    }

    #[Route('/signup', name: 'signup')]
    public function signup(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(NewUserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setPassword($passwordHasher->hashPassword($user, $user->getPassword()));
            $user->setRoles(['ROLE_USER']);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('blog/newUser.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/logout', name: 'logout')]
    public function logout(Request $request): Response
    {
        $session = $request->getSession();
        $session->set("user_connected", false);

        return $this->redirectToRoute('homepage');
    }
}
