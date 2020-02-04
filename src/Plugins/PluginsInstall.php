<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;

class PluginsInstall extends Manager
{
    protected array $headers = [
        'X-Registry-Auth' => null
    ];
    protected array $query = [
        'remote' => null,
        'name' => null
    ];

    public function setXRegistryAuth(string $value): self
    {
        $this->headers['X-Registry-Auth'] = $value;
        return $this;
    }

    public function setRemote(string $value): self
    {
        $this->query['remote'] = $value;
        return $this;
    }

    public function setName(string $value): self
    {
        $this->query['name'] = $value;
        return $this;
    }

    public function setValue(array $value): self
    {
        $this->body = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'plugins/pull')
            ->toArray();
    }
}