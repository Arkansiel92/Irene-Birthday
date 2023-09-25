<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $now = new DateTime();
        $birthday = new DateTime('2023-09-29');

        return $this->render('main/index.html.twig', [
            'days' => $now->diff($birthday)->days,
        ]);
    }
}
