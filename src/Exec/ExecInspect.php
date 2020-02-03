<?php
declare(strict_types=1);

namespace Docker\Api\Exec;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ExecInspect extends Manager
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
            ->send('GET', 'exec/' . $this->id . '/json')
            ->toArray();
    }
}