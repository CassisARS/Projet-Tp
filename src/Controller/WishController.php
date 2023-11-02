<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/wish")
 */
class WishController extends AbstractController
{

    /**
     * @Route("/", name="wish_index")
     */
    public function index(): Response
    {
        // TODO: récupérer la liste des souhaits en base de données
        return $this->render('wish/index.html.twig');
    }

    /**
     * @Route("/{id}", name="wish_details")
     */
    public function details(int $id): Response
    {

        return $this->render('wish/details.html.twig');
    }
}