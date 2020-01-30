<?php
declare(strict_types=1);

namespace Docker\Api;

use Docker\Api\DockerManager\Containers;
use Docker\Api\DockerManager\Exec;
use Docker\Api\DockerManager\Images;
use Docker\Api\DockerManager\Networks;
use Docker\Api\DockerManager\Plugins;
use Docker\Api\DockerManager\System;
use Docker\Api\DockerManager\Volumes;
use GuzzleHttp\Client;

class DockerClient
{
    public System $system;
    public Images $images;
    public Containers $containers;
    public Networks $networks;
    public Volumes $volumes;
    public Exec $exec;
    public Plugins $plugins;
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
        $this->images = new Images($this->client);
        $this->containers = new Containers($this->client);
        $this->networks = new Networks($this->client);
        $this->volumes = new Volumes($this->client);
        $this->exec = new Exec($this->client);
        $this->plugins = new Plugins($this->client);
    }
}