<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Factory;

class PluginsFactory extends Factory
{
    public function list(): PluginsList
    {
        return new PluginsList($this->client);
    }

    public function privileages(): PluginsPrivileges
    {
        return new PluginsPrivileges($this->client);
    }

    public function install(): PluginsInstall
    {
        return new PluginsInstall($this->client);
    }

    public function inspect(string $name): PluginsInspect
    {
        return new PluginsInspect($this->client, $name);
    }

    public function remove(string $name): PluginsRemove
    {
        return new PluginsRemove($this->client, $name);
    }

    public function enable(string $name): PluginsEnable
    {
        return new PluginsEnable($this->client, $name);
    }

    public function disable(string $name): PluginsDisable
    {
        return new PluginsDisable($this->client, $name);
    }

    public function upgrade(string $name): PluginsUpgrade
    {
        return new PluginsUpgrade($this->client, $name);
    }

    public function create(): PluginsCreate
    {
        return new PluginsCreate($this->client);
    }

    public function push(string $name): PluginsPush
    {
        return new PluginsPush($this->client, $name);
    }

    public function configure(string $name): PluginsConfigure
    {
        return new PluginsConfigure($this->client, $name);
    }
}