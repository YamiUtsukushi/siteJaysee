<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Utilisateur;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Review;
use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Order;
use App\Entity\CustomizationOption;
use App\Entity\Recipe;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SiteJaysee - Administration')
            ->renderContentMaximized();
    }



    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        

        // Produits
        yield MenuItem::section('Produits');
        yield MenuItem::linkToCrud('Produits', 'fa fa-tag', Product::class);
        yield MenuItem::linkToCrud('Catégories', 'fa fa-folder', Category::class);
        yield MenuItem::linkToCrud('Avis', 'fa fa-star', Review::class);
        yield MenuItem::linkToCrud('Options de personnalisation', 'fa fa-cogs', CustomizationOption::class);

        // Utilisateurs & Commandes
        yield MenuItem::section('Utilisateurs & Commandes');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Commandes', 'fa fa-shopping-cart', Order::class);

        // Recettes
        yield MenuItem::section('Recettes');
        yield MenuItem::linkToCrud('Recettes', 'fa fa-utensils', Recipe::class);

        // Blog
        yield MenuItem::section('Blog');
        yield MenuItem::linkToCrud('Articles', 'fa fa-newspaper', Post::class);
        yield MenuItem::linkToCrud('Commentaires', 'fa fa-comments', Comment::class);

    }
}
