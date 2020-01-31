<?php
declare(strict_types=1);

namespace Docker\Api\Common;

use GuzzleHttp\Client;
use RuntimeException;

abstract class Manager
{
    protected Client $client;
    protected string $method;
    protected string $path;
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
        return $this->query;
    }

    protected function getBody(): array
    {
        return $this->body;
    }

    protected function send(): Response
    {
        $response = $this->client->request(
            $this->method,
            $this->path,
            [
                'query' => $this->getQuery(),
                'json' => $this->getBody()
            ]
        );
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        return new Response($response);
    }
}