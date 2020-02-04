<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class PluginsUpgrade extends Manager
{
    private string $name;
    protected array $headers = [
        'X-Registry-Auth' => null
    ];
    protected array $query = [
        'remote' => null
    ];

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

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

    public function setValue(array $value): self
    {
        $this->body = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'plugins/' . $this->name . '/upgrade')
            ->toArray();
    }
}