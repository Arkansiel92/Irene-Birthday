<?php

namespace App\Controller;

use App\Repository\GiftsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListGiftsController extends AbstractController
{
    #[Route('/cadeaux', name: 'app_list_gifts')]
    public function index(): Response
    {
        return $this->render('list_gifts/index.html.twig', [
            
        ]);
    }
}
