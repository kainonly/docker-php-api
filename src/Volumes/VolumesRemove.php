<?php
declare(strict_types=1);

namespace Docker\Api\Volumes;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class VolumesRemove extends Manager
{
    private string $name;
    protected array $query = [
        'force' => false
    ];

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function setForce(bool $value): self
    {
        $this->query['force'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('DELETE', 'volumes/' . $this->name)
            ->toArray();
    }
}