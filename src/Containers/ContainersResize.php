<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersResize extends Manager
{
    private string $id;
    protected array $body = [
        'h' => null,
        'w' => null,
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setHight(int $value): self
    {
        $this->body['h'] = $value;
        return $this;
    }

    public function setWidth(int $value): self
    {
        $this->body['w'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/resize')
            ->isOk();
    }
}