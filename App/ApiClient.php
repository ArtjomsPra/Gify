<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;

class ApiClient {

    private $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getGifs (string $searchWord) : array {
        $url = 'https://api.giphy.com/v1/gifs/search';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'api_key' => $_ENV['API_KEY'],
                'q' => $searchWord
            ]
        ]);
        $gifsData = json_decode($response->getBody()->getContents(), true)['data'];
        $returnedGifs = [];
        foreach ($gifsData as $gify) {
            $returnedGifs[] = new Gify(
                $gify['title'],
                $gify['images']['downsized']['url']
            );
        }
        return $returnedGifs;
    }


}
