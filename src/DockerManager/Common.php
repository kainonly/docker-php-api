<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

use Docker\Api\Common\Response;
use GuzzleHttp\Client;
use RuntimeException;

abstract class Common
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function send(
        string $method,
        string $path,
        array $requestQuery = [],
        array $requestBody = []
    ): Response
    {
        $response = $this->client->request($method, $path, [
            'query' => $requestQuery ?? [],
            'json' => $requestBody ?? []
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        return new Response($response);
    }

    protected function strings(array $map): string
    {
        return json_encode($map, JSON_THROW_ON_ERROR, 512);
    }
}