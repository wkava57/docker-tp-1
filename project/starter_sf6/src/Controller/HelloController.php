<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class HelloController extends AbstractController
{
//    #[Route('/helloRandom', name:'app_hello')]
//    public function randomNameAction(): Response
//    {
//        return $this->render("/hello.html.twig",[
//
//            'name'=>self::generateRandomName(),
//
//        ]);
//    }

    static function generateRandomName(): string
    {
        $nouns = [
            "Circle","Cone","Cylinder","Ellipse","Hexagon",
            "Irregular Shape","Octagon","Oval","Parallelogram",
            "Pentagon","Pyramid","Rectangle","Semicircle","Sphere",
            "Square","Star","Trapezoid","Triangle","Wedge","Whorl",
        ];
        $adjectives = [
            "Amusing", "Athletic", "Beautiful", "Brave", "Careless",
            "Clever", "Crafty", "Creative", "Cute", "Dependable",
            "Energetic", "Famous", "Friendly", "Graceful", "Helpful",
            "Humble", "Inconsiderate", "Likable", "Mid  Class", "Outgoing",
            "Poor", "Practical", "Rich", "Sad", "Skinny", "Successful", "Thin",
            "Ugly", "Wealth",
        ];
        return $adjectives[array_rand($adjectives)] .
            " " .
            $nouns[array_rand($nouns)];
    }

    #[Route('/hello/{name}', name:'app_hello')]
    public function nameAction($name = ""): Response
    {
        if ($name == "") {
            $name = self::generateRandomName();
        }

        return $this->render("/hello.html.twig",[

            'name'=>$name,

        ]);    }
}