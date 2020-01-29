<?php
declare(strict_types=1);

namespace Docker\Api;

use Docker\Api\DockerManager\Containers;
use Docker\Api\DockerManager\System;
use GuzzleHttp\Client;

class DockerClient
{
    public System $system;
    public Containers $containers;
    private Client $client;

    public static function create(string $uri, float $timeout = 2.0): self
    {
        $client = new self($uri, $timeout);
        $client->injections();
        return $client;
    }

    public function __construct(string $uri, float $timeout)
    {
        $this->client = new Client([
            'base_uri' => $uri,
            'timeout' => $timeout,
        ]);
    }

    private function injections()
    {
        $this->system = new System($this->client);
        $this->containers = new Containers($this->client);
    }
}