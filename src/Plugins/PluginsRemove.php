<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class PluginsRemove extends Manager
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

    public function result(): string
    {
        return $this
            ->send('DELETE', 'plugins/' . $this->name)
            ->isOk();
    }
}