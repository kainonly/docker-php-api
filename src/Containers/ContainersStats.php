<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersStats extends Manager
{
    private string $id;
    protected array $query = [
        'stream' => true
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setStream(bool $value): self
    {
        $this->query['stream'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'containers/' . $this->id . '/stats')
            ->toArray();
    }
}