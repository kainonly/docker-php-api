<?php
declare(strict_types=1);

namespace Docker\Api;

use GuzzleHttp\Client;
use Docker\Api\Containers\ContainersFactory;
use Docker\Api\Exec\ExecFactory;
use Docker\Api\Images\ImagesFactory;
use Docker\Api\Networks\NetworksFactory;
use Docker\Api\Plugins\PluginsFactory;
use Docker\Api\System\SystemFactory;
use Docker\Api\Volumes\VolumesFactory;

class DockerClient
{
    public SystemFactory $system;
    public ImagesFactory $images;
    public ContainersFactory $containers;
    public NetworksFactory $networks;
    public VolumesFactory $volumes;
    public ExecFactory $exec;
    public PluginsFactory $plugins;
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
        $this->system = new SystemFactory($this->client);
        $this->images = new ImagesFactory($this->client);
        $this->containers = new ContainersFactory($this->client);
        $this->networks = new NetworksFactory($this->client);
        $this->volumes = new VolumesFactory($this->client);
        $this->exec = new ExecFactory($this->client);
        $this->plugins = new PluginsFactory($this->client);
    }
}