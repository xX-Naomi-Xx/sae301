<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {

        // Le message que tu veux afficher
        $message = "Bienvenue sur ma page d'accueil !";

        // On envoie le message au template
        return $this->render('accueil/index.html.twig', [
            'message' => $message,
        ]);
    }
}

