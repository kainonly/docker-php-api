<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersRestart extends Manager
{
    private string $id;
    protected array $query = [
        't' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setTimeout(int $value): self
    {
        $this->query['t'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/restart')
            ->isOk();
    }
}