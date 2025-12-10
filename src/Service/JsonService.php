<?php


namespace App\Service;

class JsonService
{
    public function lire(string $Fichier): array
    {
        $fichierJson = file_get_contents($Fichier);
        $tableauJson = json_decode($fichierJson, true);
        return $tableauJson;
    }

}
