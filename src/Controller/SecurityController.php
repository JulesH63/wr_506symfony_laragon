<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #Route(path: '/login', name: 'app_login')]
    public function login(#[CurrentUser] $user = null): Response
    {
        return $this->json( [
            'user' => $user ? $user->getId() : null,
        ]);
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall');
    }


    // #[Route('/security', name: 'app_security')]
//     public function index(): Response
//     {
//         return $this->render('security/index.html.twig', [
//             'controller_name' => 'SecurityController',
//         ]);
//     }
}
