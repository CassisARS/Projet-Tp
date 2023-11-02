<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(): Response
    {
        return $this->render("main/home.html.twig");
    }

    /**
     * @Route("/about-us", name="about_us")
     */
    public function aboutUs(): Response
    {
        // chemin d'accès au fichier
        $file ='../data/team.json';
        // contenu mis dans une variable, méthode précise file_get_contents
        $data = file_get_contents($file);
        // décoder
        $obj= json_decode($data);
        // accéder à l'élément

        return $this->render("main/about_us.html.twig",['obj'=>$obj]);
    }
}