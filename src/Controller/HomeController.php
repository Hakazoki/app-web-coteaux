<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{   
    #[Route('/', name : 'app_root')]
    public function root(): RedirectResponse
    {
        return $this->redirectToRoute('app_home');
    }
    #[Route('/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig');
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
