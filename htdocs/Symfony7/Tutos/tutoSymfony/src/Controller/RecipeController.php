<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    #[Route("/recipe", name: "recipe.index")]
    public function index(Request $request, RecipeRepository $repository):Response
    {
        $totalDuration = $repository->findTotalDuration();
        $recipes = $repository->findAll();

        return $this->render("recipe/index.html.twig",[
            "recipes"=>$recipes,
            "totalDuration" =>$totalDuration,
        ]);
    }

    #[Route('/recipe/{slug}-{id}', name: 'recipe.show', requirements: ['slug' => '[a-z0-9-]+', 'id' => '\d+'])]
    // We use the hydrate method to get the URL parameters
        public function show(Request $request, string $slug, int $id, RecipeRepository $repository): Response
        {
            // return new JsonResponse([
            //     "slug"=>$slug
            // ]);
            // $repository->findOneBy("slug" =>$slug) //to search by slug (it has to be the same string)
            $recipe = $repository->find($id);
            if($recipe->getSlug() !== $slug){
                return $this->redirectToRoute("recipe.show", ["slug"=> $recipe->getSlug(),"id"=>$recipe->getId()]);
            }
            return $this->render("recipe/show.html.twig", [
                "recipe"=>$recipe,
            ]);
        }
    // We use the object Request methods to get the URL parameters
        // public function index(Request $request): Response
        // {
        //     dd($request->attributes->getInt("id"), $request->attributes->get("slug") );
        // }
}
