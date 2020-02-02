<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class NetworksRemove extends Manager
{
    private string $id;

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->name = $id;
    }

    public function result(): string
    {
        return $this
            ->send('DELETE', 'networks/' . $this->id)
            ->isOk();
    }
}