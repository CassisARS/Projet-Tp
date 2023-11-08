<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Entity\Wish;
use App\Form\SerieType;
use App\Form\WishType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(EntityManagerInterface $entityManager): Response
    {

        $wishRepository = $entityManager->getRepository(Wish::class);
        $wishes = $wishRepository->findBy(['isPublished' => true], ['dateCreated' => 'DESC']);



        return $this->render('wish/index.html.twig', [
            'wishes'=>$wishes]);
    }



    /**
     * @Route("/newWish", name="wish_newWish")
     * @IsGranted("ROLE_USER")
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $username= $this->getUser()->getUsername();
        $wish= new Wish();
        $wish->setAuthor($username);

        $wishForm = $this->createForm(WishType::class, $wish);

        $wishForm->handleRequest($request);

        if($wishForm->isSubmitted() && $wishForm->isValid()){
            $entityManager->persist($wish);
            $entityManager->flush();
            $this->addFlash( 'success', 'le souhait est bien enregistrée');

            return $this->redirectToRoute( 'wish_details', ['id'=> $wish->getId()]);

        }

        return $this->render('wish/newWish.html.twig', [
            'wishForm' => $wishForm->createView()
        ]);


    }

    /**
     * @Route("/{id}", name="wish_details")
     */
    public function details(Wish $wish): Response
    {

        return $this->render('wish/details.html.twig', ['wish' => $wish]);
    }
    
}
