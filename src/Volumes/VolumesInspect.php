<?php
declare(strict_types=1);

namespace Docker\Api\Volumes;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class VolumesInspect extends Manager
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
            ->send('GET', 'volumes/' . $this->name)
            ->toArray();
    }
}