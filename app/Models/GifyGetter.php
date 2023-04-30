<?php declare(strict_types=1);

namespace Gifyv2\Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class GifyGetter {

    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }


public function getSearchedGifs (string $searchWord) : array
{
    $url = 'api.giphy.com/v1/gifs/search';
    $response =$this->client->request('GET', $url, ['query' => [
        'api_key' => $_ENV['API_KEY'],
        'q' => $searchWord]]);
    $gifsData = json_decode($response->getBody()->getContents(), true)['data'];
    return $this->returnedGifsCreatingObjects($gifsData);
}

    public function getTrendingGifs () : array
    {
        $url = 'api.giphy.com/v1/gifs/trending';
        $response =$this->client->request('GET', $url, ['query' => [
            'api_key' => $_ENV['API_KEY'],
            'limit' => 5]]);
        $gifsData = json_decode($response->getBody()->getContents(), true)['data'];
        return $this->returnedGifsCreatingObjects($gifsData);
    }

    private function returnedGifsCreatingObjects (array $gifys) : array
    {

        $returnedGifys = [];
        foreach ($gifys as $gify) {
            $returnedGifys[] = new Gify(
                $gify['title'],
                $gify['url'],
                $gify['id'],
                $gify['rating']
            );
        }
        return $returnedGifys;
    }

}
