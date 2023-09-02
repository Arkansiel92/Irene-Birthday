<?php

namespace App\Controller;

use App\Repository\GiftsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuestbookController extends AbstractController
{
    #[Route('/guestbook', name: 'app_guestbook')]
    public function index(GiftsRepository $gifts): Response
    {
        return $this->render('guestbook/index.html.twig', [
            'gifts' => $gifts->findAll(),
        ]);
    }
}
