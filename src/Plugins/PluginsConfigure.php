<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class PluginsConfigure extends Manager
{
    private string $name;

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function setValue(array $value): self
    {
        $this->body = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'plugins/' . $this->name . '/set')
            ->isOk();
    }
}