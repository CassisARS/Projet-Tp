<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/wish")
 */
class WishController extends AbstractController
{

    /**
     * @Route("/", name="wish_index")
     */
    public function list(): Response
    {
        // TODO: récupérer la liste des souhaits en base de données
        return $this->render('wish/list.html.twig');
    }

    /**
     * @Route("/", name="wish_details")
     */
    public function details(): Response
    {

        return $this->render('wish/details.html.twig');
    }
}