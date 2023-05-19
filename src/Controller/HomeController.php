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

// #[IsGranted('ROLE_ADMIN')]
class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function home(AuthenticationUtils $authenticationUtils): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        dd('here');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsernameEntered = $authenticationUtils->getLastUsername();
        $loginForm = $this->createForm(LoginType::class);

        // $loginForm->handleRequest($request);
        // if ($loginForm->isSubmitted() && $loginForm->isValid()) {
        //     $loginInformation = $loginForm->getData();
        //     dd($loginInformation);
        // }

        return $this->render('home.html.twig');
    }
}
