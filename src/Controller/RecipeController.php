<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Recipe;

class RecipeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/recipe', name: 'app_recipe')]
    public function index(): Response
    {
        $recipes = $this->entityManager->getRepository(Recipe::class)->findAll();

        return $this->render('recipe/index.html.twig', [
            'controller_name' => 'RecipeController',
            'recipes' => $recipes,
        ]);
    }
    
    #[Route('/recipes', name: 'app_recipes_list')]
    public function list(): Response
    {

        $recipes = $this->entityManager
            ->getRepository(Recipe::class)
            ->findAll();

        return $this->render('recipe/list.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    #[Route('/recipes/{id}', name: 'app_recipe_detail')]
    public function detail(int $id): Response
    {
        $recipes = $this->entityManager
            ->getRepository(Recipe::class)
            ->find($id);

        if (!$recipes) {
            throw $this->createNotFoundException('The recipe does not exist');
        }

        return $this->render('recipe/detail.html.twig', [
            'recipes' => $recipes,
        ]);
    }
}
