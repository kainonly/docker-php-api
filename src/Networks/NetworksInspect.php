<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class NetworksInspect extends Manager
{
    private string $id;
    protected array $query = [
        'verbose' => false,
        'scope' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setVerbose(bool $value): self
    {
        $this->query['verbose'] = $value;
        return $this;
    }

    public function setScope(string $value): self
    {
        $this->query['scope'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'networks/' . $this->id)
            ->toArray();
    }

}