<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersRename extends Manager
{
    private string $id;
    protected array $query = [
        'name' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setName(string $name): self
    {
        $this->query['name'] = $name;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/rename')
            ->isOk();
    }
}