<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersRemove extends Manager
{
    private string $id;
    protected array $query = [
        'v' => false,
        'force' => false,
        'link' => false
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function withVolumes(bool $value): self
    {
        $this->query['v'] = $value;
        return $this;
    }

    public function setForce(bool $value): self
    {
        $this->query['force'] = $value;
        return $this;
    }

    public function setLink(bool $value): self
    {
        $this->query['link'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('DELETE', 'containers/' . $this->id)
            ->isOk();
    }
}