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
    private Client $client;
    public SystemFactory $system;
    public ImagesFactory $images;
    public ContainersFactory $containers;
    public NetworksFactory $networks;
    public VolumesFactory $volumes;
    public ExecFactory $exec;
    public PluginsFactory $plugins;

    public static function create(string $uri, float $timeout = 2.0): self
    {
        $client = new self($uri, $timeout);
        $client->factorys();
        return $client;
    }

    public function __construct(string $uri, float $timeout)
    {
        $this->client = new Client([
            'base_uri' => $uri,
            'timeout' => $timeout,
        ]);
    }

    private function factorys()
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