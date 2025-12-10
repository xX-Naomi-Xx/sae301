<?php


namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Client;
use App\Service\JsonService;
use Doctrine\ORM\EntityManagerInterface;
class ImportClient extends AbstractController
{
    #[Route('/import', name: 'app_import')]
    public function index(JsonService $jsonService, EntityManagerInterface $entityManager) : Response
    {

        $clients = $jsonService->lire('donnees.json');

        // Parcours du Tableau $jsonJeux
        // Création d'un Objet jeu
        foreach ($clients['clients'] as $item) {
            $client = new Client();
            $client->setNom($item['nom']);
            $client->setPrenom($item['prenom']);
            $client->setAdresse($item['adresse']);
            $client->setTelephone($item['telephone']);
            $client->setService($item['service']);
            $client->setEmail($item['email']);
            $client->setDate(new \DateTime($item['date']));

            $entityManager->persist($client);
        }

        $entityManager->flush();

        //Marquer l'entité créée pour qu'elle soit ajoutée à la base données
        $entityManager->persist($client);
        // Appliquer les changements à la base de données
        $entityManager->flush();

        // dd($jeu);
        return new Response('Importation réussie, ouvrez phpMyAdmin pour vérifier');
    }

}

