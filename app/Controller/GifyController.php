<?php declare(strict_types=1);

namespace Gifyv2\Controller;

use Gifyv2\Models\GifyGetter;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class GifyController
{
    private GifyGetter $client;
    private Environment $twig;

    public function __construct ()
    {
        $this->client = new GifyGetter();
        $loader = new FilesystemLoader(__DIR__.'/../Views');
        $this->twig = new Environment($loader);
    }

    public function search(): string
    {
        $query = $_GET['q'] ?? '';
        $gifs = $this->client->getSearchedGifs($query);
        return $this->twig->render('search.html.twig', ['gifs' => $gifs]);
    }

    public function trending(): string
    {
        $gifs = $this->client->getTrendingGifs();
        return $this->twig->render('trending.html.twig', ['gifs' => $gifs]);
    }


}
