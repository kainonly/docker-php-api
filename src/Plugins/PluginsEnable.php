<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class PluginsEnable extends Manager
{
    private string $name;
    protected array $query = [
        'timeout' => 0
    ];

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function setTimeout(int $value): self
    {
        $this->query['timeout'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'plugins/' . $this->name . '/enable')
            ->isOk();
    }

}