<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersWait extends Manager
{
    private string $id;
    protected array $query = [
        'condition' => 'not-running'
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setCondition(string $value): self
    {
        $this->query['condition'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/wait')
            ->toArray();
    }
}