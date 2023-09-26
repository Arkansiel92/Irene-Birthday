<?php

namespace App\Controller;

use App\Entity\Gifts;
use App\Form\GiftsFormType;
use Doctrine\Persistence\ManagerRegistry as Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class AddGiftController extends AbstractController
{
    #[Route('/ajouter', name: 'app_add_gift')]
    public function index(Request $request, Manager $doctrine, SluggerInterface $slugger): Response
    {
        $gift = new Gifts;
        $giftsForm = $this->createForm(GiftsFormType::class, $gift);
        $giftsForm->handleRequest($request);

        if($giftsForm->isSubmitted() && $giftsForm->isValid()) {
            // $file = $giftsForm->get('file')->getData();

            
            // if($file) {
            //     $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            //     $safeFilename = $slugger->slug($originalFilename);
            //     $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

            //     try {
            //         $file->move(
            //             $this->getParameter('files_directory'),
            //             $newFilename
            //         );
            //     } catch (FileException $e) {
            //         $this->addFlash('error', 'Une erreur est survenue lors du téléchargement de la photo');

            //         return $this->redirectToRoute('app_add_gift');
            //     }

            //     $gift->setFile($newFilename);
            // }

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
