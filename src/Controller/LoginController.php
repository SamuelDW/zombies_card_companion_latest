<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    #[Route('/', name: 'login')]
    public function login(Request $request): Response
    {
        $loginForm = $this->createForm(LoginType::class);

        $loginForm->handleRequest($request);
        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            $loginInformation = $loginForm->getData();
            dd($loginInformation);
        }

        return $this->render('login.html.twig', [
            'loginForm' => $loginForm->createView(),
        ]);
    }
}
