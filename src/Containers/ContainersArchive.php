<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersArchive extends Manager
{
    private string $id;
    protected array $query = [
        'path' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setPath(string $value): self
    {
        $this->query['path'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('GET', 'containers/' . $this->id . '/archive')
            ->isOk();
    }
}