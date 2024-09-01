<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecipeController extends AbstractController
{
    #[Route("/recipe", name: "recipe.index")]
    public function index(Request $request):Response
    {
        return $this->render("recipe/index.html.twig");
    }

    #[Route('/recipe/{slug}-{id}', name: 'recipe.show', requirements: ['slug' => '[a-z0-9-]+', 'id' => '\d+'])]
    // We use the hydrate method to get the URL parameters
        public function show(Request $request, string $slug, int $id): Response
        {
            // return new JsonResponse([
            //     "slug"=>$slug
            // ]);
            return $this->render("recipe/show.html.twig", [
                "slug"=>$slug,
                "id"=>$id,
                "person"=>[
                    'firstname' => 'John',
                    'lastname'=> 'Doe',
                ],
            ]);
        }
    // We use the object Request methods to get the URL parameters
        // public function index(Request $request): Response
        // {
        //     dd($request->attributes->getInt("id"), $request->attributes->get("slug") );
        // }
}
