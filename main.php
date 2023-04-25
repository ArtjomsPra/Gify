<?php declare(strict_types=1);

require_once 'vendor\autoload.php';

use App\ApiClient;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if (isset($_GET['search'])) {
    $apiClient = new ApiClient();
    $gifs = $apiClient->getGifs($_GET['search']);
}

require 'site.php';



