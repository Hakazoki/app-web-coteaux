<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {

        $this->denyAccessUnlessGranted('ROLE_PRODUCTER');
        $producter = $this->getUser()->getIdProducter();

        if (!$producter) {
            $this->addFlash('warning', 'Access Denied');
            return $this->redirectToRoute('app_home');
        }

        $products = $producter->getProducts();

        $totalStock = 0;
        $lowStock = 0;
        foreach ($products as $product) {
            $totalStock += $product->getQuantity();
            if ($product->getQuantity() < 5) {
                $lowStock++;
            }
        }

        return $this->render('dashboard/dashboard.html.twig', [
            'producter'     => $producter,
            'products'      => $products,
            'totalProducts' => count($products),
            'totalStock'    => $totalStock,
            'lowStock'      => $lowStock,
        ]);
    }
}
