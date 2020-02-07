<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersInspect extends Manager
{
    private string $id;
    protected array $query = [
        'size' => false
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setSize(bool $value): self
    {
        $this->query['size'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'containers/' . $this->id . '/json')
            ->toArray();
    }
}