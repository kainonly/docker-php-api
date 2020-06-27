<?php
declare(strict_types=1);

namespace DockerEngineAPI;

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class DockerClient
{
    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    public function __construct(Client $client)
    {


        $this->system = new SystemFactory($client);
        $this->images = new ImagesFactory($client);
        $this->containers = new ContainersFactory($client);
        $this->networks = new NetworksFactory($client);
        $this->volumes = new VolumesFactory($client);
        $this->exec = new ExecFactory($client);
        $this->configs = new ConfigsFactory($client);
        $this->plugins = new PluginsFactory($client);
    }
}