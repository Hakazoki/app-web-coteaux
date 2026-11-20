<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SecurController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('secur/login.html.twig');
    }
    #[Route('/register', name: 'app_register')]
    public function register():Response
    {
        return $this->render('secur/register.html.twig');
    }
}
