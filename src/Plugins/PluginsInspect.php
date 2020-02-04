<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class PluginsInspect extends Manager
{
    private string $name;

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'plugins/' . $this->name . '/json')
            ->toArray();
    }
}