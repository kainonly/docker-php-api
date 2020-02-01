<?php
declare(strict_types=1);

namespace Docker\Api\Common;

use GuzzleHttp\Client;
use RuntimeException;

abstract class Manager
{
    protected Client $client;
    protected array $query = [];
    protected array $body = [];

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function strings(array $map): string
    {
        return json_encode($map, JSON_THROW_ON_ERROR, 512);
    }

    protected function getQuery(): array
    {
        return array_filter($this->query, fn($v) => !empty($v));
    }

    protected function getBody(): array
    {
        return array_filter($this->body, fn($v) => !empty($v));
    }

    protected function send(string $method, string $path): Response
    {
        $response = $this->client->request(
            $this->method,
            $this->path,
            [
                'query' => $this->getQuery(),
                'json' => $this->getBody()
            ]
        );
        if (!in_array($response->getStatusCode(), [200, 201, 204])) {
            throw new RuntimeException('Something went wrong.');
        }
        return new Response($response);
    }
}