<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ImagesRemove extends Manager
{
    private string $name;
    protected array $query = [
        'force' => false,
        'noprune' => false
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

    public function setNoprune(bool $value): self
    {
        $this->query['noprune'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('DELETE', 'images/' . $this->name)
            ->toArray();
    }
}