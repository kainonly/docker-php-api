<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Factory;

class NetworksFactory extends Factory
{
    public function list(): NetworksList
    {
        return new NetworksList($this->client);
    }

    public function inspect(string $id): NetworksInspect
    {
        return new NetworksInspect($this->client, $id);
    }

    public function remove(string $id): NetworksRemove
    {
        return new NetworksRemove($this->client, $id);
    }

    public function create(): NetworksCreate
    {
        return new NetworksCreate($this->client);
    }

    public function connect(string $id): NetworksConnect
    {
        return new NetworksConnect($this->client, $id);
    }

    public function disconnect(string $id): NetworksDisconnect
    {
        return new NetworksDisconnect($this->client, $id);
    }

    public function prune(): NetworksPrune
    {
        return new NetworksPrune($this->client);
    }
}