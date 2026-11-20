<?php

namespace App\Controller;
use App\Entity\Products;
use App\Form\NewProductType;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_products_list')]
    public function list(ProductsRepository $productsRepository): Response
    {
        return $this->render('products/list.html.twig', ['products' => $productsRepository->findAll(),]);
    }

    #[Route('/products/{id}', name: 'app_products_show', requirements: ['id' => '\d+'])]
    public function show(Products $products): Response
    {
        return $this->render('products/show.html.twig', ['products' => $products]);
    }

    #[Route('/products/new', name: 'app_products_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $products = new Products();
        $form = $this->createForm(NewProductType::class, $products);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($products);
            $em->flush();
            $this->addFlash('success', 'Produit créé.');

            return $this->redirectToRoute('app_products_show', ['id' => $products->getId()]);
        }

        return $this->render('products/new.html.twig', ['form' => $form]);
    }

    #[Route('/products/{id}/edit', name: 'app_products_edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
    public function edit(Products $products, Request $request, EntityManagerInterface $entityManager): Response
    {
        if($request->isMethod('POST')) {
            if (!$this->isCsrfTokenValid('product_edit', $request->request->get('_token'))) {

                throw $this->createAccessDeniedException('Invalid Token');
            }

            $products->setName($request->request->get('name'));
            $products->setStatus($request->request->get('status'));
            $products->setDelay($request->request->getInt('delay'));
            $products->setImage($request->request->get('image'));
            $products->setDescription($request->request->get('description'));
            $products->setPricingType($request->request->get('pricing_type'));
            $products->setPrice((float) $request->request->get('price'));
            $products->setQuantity($request->request->get('quantity'));

            $entityManager->flush();

            return $this->redirectToRoute('app_products_show', ['id' => $products->getId()]);

            }

            return $this->render('products/edit.html.twig', ['product' => $products,]);

    }

    #[Route('/products/{id}/delete', name: 'app_products_delete', requirements: ['id' => '\d+'], methods: ['POST'])]
    public function delete(Products $products, Request $request, EntityManagerInterface $entityManager): Response
    {
        if (!$this->isCsrfTokenValid('products_delete', $request->request->get('_token'))) {
            throw $this->createAccessDeniedException('Invalid token');
        }

        $entityManager->remove($products);
        $entityManager->flush();

        return $this->redirectToRoute('app_products_list');
    }

}
