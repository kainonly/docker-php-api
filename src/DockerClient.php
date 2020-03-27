<?php
declare(strict_types=1);

namespace Docker\Api;

use Docker\Api\Configs\ConfigsFactory;
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
    public ConfigsFactory $configs;
    public PluginsFactory $plugins;

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