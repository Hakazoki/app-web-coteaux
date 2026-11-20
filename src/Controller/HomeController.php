<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('home/accueil.html.twig');
    }
    #[Route('/about', name : 'app_about')]
    public function about(): Response
    {
        return $this->render('home/about.html.twig');
    }
    #[Route('/mention-legales', name: 'legal')]
    public function legal(): Response
    {
        return $this->render('home/legale.html.twig');
    }
}
