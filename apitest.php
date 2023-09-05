<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.techspecs.io/v4/product/search?query=iPhone%2014', [
  'headers' => [
    'Authorization' => 'Bearer techspecs_api_key',
    'accept' => 'application/json',
    'content-type' => 'application/json',
  ],
]);

echo $response->getBody();