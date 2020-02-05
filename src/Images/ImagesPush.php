<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ImagesPush extends Manager
{
    private string $name;
    protected array $headers = [
        'X-Registry-Auth' => null
    ];
    protected array $query = [
        'tag' => null
    ];

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function setTag(string $value): self
    {
        $this->query['tag'] = $value;
        return $this;
    }

    public function setXRegistryAuth(string $value): self
    {
        $this->headers['X-Registry-Auth'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'images/' . $this->name . '/push')
            ->toArray();
    }

}