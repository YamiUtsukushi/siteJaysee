<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;
use App\Entity\Order;
use App\Entity\Review;

class UtilisateurController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(): Response
    {
        $utilisateur = $this->getUtilisateur(); // Récupère l'utilisateur actuellement connecté

        // Récupérer les commandes et avis associés à l'utilisateur
        $orders = $this->entityManager->getRepository(Order::class)->findBy(['utilisateur' => $utilisateur]);
        $reviews = $this->entityManager->getRepository(Review::class)->findBy(['utilisateur' => $utilisateur]);

        return $this->render('utilisateur/index.html.twig', [
            'utilisateur' => $utilisateur,
            'orders' => $orders,
            'reviews' => $reviews,
        ]);
    }
}
