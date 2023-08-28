<?php

namespace App\Controller;

use App\Entity\Gifts;
use App\Form\GiftsFormType;
use Doctrine\Persistence\ManagerRegistry as Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddGiftController extends AbstractController
{
    #[Route('/ajouter', name: 'app_add_gift')]
    public function index(Request $request, Manager $doctrine): Response
    {
        $gift = new Gifts;

        $giftsForm = $this->createForm(GiftsFormType::class, $gift);
        $giftsForm->handleRequest($request);

        if($giftsForm->isSubmitted() && $giftsForm->isValid()) {
            $em = $doctrine->getManager();

            $em->persist($gift);
            $em->flush();

            $this->addFlash('success', 'Le cadeau a été ajouté avec succès !');

            return $this->redirectToRoute('app_main');
        }

        return $this->render('add_gift/index.html.twig', [
            'form' => $giftsForm->createView()
        ]);
    }
}
