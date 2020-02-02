<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class NetworksConnect extends Manager
{
    private string $id;
    protected array $body = [
        'Container' => null,
        'EndpointConfig' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->name = $id;
    }

    public function setContainer(string $value): self
    {
        $this->body['Container'] = $value;
        return $this;
    }

    public function setEndpointConfig(array $value): self
    {
        $this->body['EndpointConfig'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'networks/' . $this->id . '/connect')
            ->isOk();
    }
}