<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersTop extends Manager
{
    private string $id;
    protected array $query = [
        'ps_args' => '-ef'
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'containers/' . $this->id . '/top')
            ->toArray();
    }
}