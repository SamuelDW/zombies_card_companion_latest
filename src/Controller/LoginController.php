<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsernameEntered = $authenticationUtils->getLastUsername();
        $loginForm = $this->createForm(LoginType::class);

        // $loginForm->handleRequest($request);
        // if ($loginForm->isSubmitted() && $loginForm->isValid()) {
        //     $loginInformation = $loginForm->getData();
        //     dd($loginInformation);
        // }

        return $this->renderForm('login.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastUsernameEntered,
            'error' => $error,
            'loginForm' => $loginForm,
        ]);
    }
}
