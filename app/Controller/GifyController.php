<?php declare(strict_types=1);

namespace Gifyv2\Controller;

use Gifyv2\Models\GifyGetter;

class GifyController
{
    private GifyClient $client;

    public function __construct ()
    {
        $this->client = new GifyGetter();
    }

    public function search() : array
    {
        return $this->client->getSearchedGifs();
    }

    public function trending() : array
    {
        return $this->client->getTrendingGifs();
    }


}