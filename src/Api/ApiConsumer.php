<?php

namespace App\Api;

use App\Dto\Movie;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class ApiConsumer
{
    public function __construct(
        private HttpClientInterface $httpClient,
        #[Autowire(env: 'OMDB_API_URL')]
        private string $url,
        #[Autowire(env: 'OMDB_API_KEY')]
        private string $apiKey,
    )
    {
    }

    public function getMovieById(string $id): ?Movie
    {
        $response = $this->httpClient->request('GET', $this->url, [
            'query' => ['apiKey' => $this->apiKey, 'i' => $id]
        ]);

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        $data = $response->toArray();

        return new Movie($data['Title'], $data['Year'], $data['imdbRating'], $data['Poster']);
    }
}
