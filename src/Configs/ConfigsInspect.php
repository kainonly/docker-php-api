<?php
declare(strict_types=1);

namespace Docker\Api\Configs;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ConfigsInspect extends Manager
{
    private string $id;

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'configs/' . $this->id)
            ->toArray();
    }
}