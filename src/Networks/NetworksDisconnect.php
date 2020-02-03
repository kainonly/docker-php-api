<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class NetworksDisconnect extends Manager
{
    private string $id;
    protected array $body = [
        'Container' => null,
        'Force' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setContainer(string $value): self
    {
        $this->body['Container'] = $value;
        return $this;
    }

    public function setForce(bool $value): self
    {
        $this->body['Force'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'networks/' . $this->id . '/disconnect')
            ->isOk();
    }
}