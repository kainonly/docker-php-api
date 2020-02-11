<?php
declare(strict_types=1);

namespace Docker\Api\Configs;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ConfigsDelete extends Manager
{
    private string $id;

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function result(): string
    {
        return $this
            ->send('DELETE', 'configs/' . $this->id)
            ->isOk();
    }
}