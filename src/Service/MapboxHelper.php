<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

// Dans Symfony, on peut créer un service (au lieu d’un Helper Laravel) pour envoyer une requête HTTP à l’API de Mapbox.
class MapboxHelper
{
    private HttpClientInterface $httpClient;
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $mapboxToken)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $mapboxToken;
    }

    // la méthode geocodeAddress est censée retourner un tableau d'où le array et si aucun résultat n'est trouvé ou si une erreur se produit elle retournera null d'où le ? (nouvelles annotations de types depuis PHP 7+)
    public function geocodeAddress(string $address): ?array
    {
        $url = "https://api.mapbox.com/geocoding/v5/mapbox.places/" . urlencode($address) . ".json?access_token={$this->apiKey}";

        try {
                $response = $this->httpClient->request('GET', $url);
                $data = $response->toArray();

                if (!isset($data['features'][0])) {
                    return null;
                }

                return [
                    'longitude' => $data['features'][0]['geometry']['coordinates'][0],
                    'latitude' => $data['features'][0]['geometry']['coordinates'][1],
                    'full_address' => $data['features'][0]['place_name'],
                ];
            } 

        // \Exception est une classe PHP qui représente TOUTES les erreurs gérées sous forme d'exception. $e est une variable qui contient l'exception levée (on pourrait l'afficher avec $e->getMessage()).
        catch (\Exception $e) {
            
                return null; // ceci est le comportement par défaut MAIS on peut mieux faire en loguant l'erreur comme ceci
        }
    }

}
