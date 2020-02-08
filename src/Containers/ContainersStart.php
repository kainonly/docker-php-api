<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersStart extends Manager
{
    private string $id;
    protected array $query = [
        'detachKeys' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setDetachKeys(string $value): self
    {
        $this->query['detachKeys'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/start')
            ->isOk();
    }
}