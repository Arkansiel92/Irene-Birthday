<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddGiftController extends AbstractController
{
    #[Route('/ajouter', name: 'app_add_gift')]
    public function index(): Response
    {
        return $this->render('add_gift/index.html.twig', [
            'controller_name' => 'AddGiftController',
        ]);
    }
}
