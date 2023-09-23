<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;



class ProductController extends AbstractController
{
    private $entityManager; // Assurez-vous de déclarer cette propriété

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/products', name: 'products_list')]
    public function listAll(): Response
    {
        $products = $this->entityManager
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('product/list.html.twig', [
            'products' => $products,
        ]);
    }

    #[Route('/products/{productId}', name: 'product_detail')]
    public function show(int $productId): Response
    {
        $product = $this->entityManager
            ->getRepository(Product::class)
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException('Le produit demandé n\'existe pas');
        }

        return $this->render('product/detail.html.twig', [
            'products' => $product,
        ]);
    }



}
