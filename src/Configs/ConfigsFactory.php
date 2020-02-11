<?php
declare(strict_types=1);

namespace Docker\Api\Configs;

use Docker\Api\Common\Factory;

class ConfigsFactory extends Factory
{
    public function list(): ConfigsList
    {
        return new ConfigsList($this->client);
    }

    public function create(): ConfigsCreate
    {
        return new ConfigsCreate($this->client);
    }

    public function inspect(string $id): ConfigsInspect
    {
        return new ConfigsInspect($this->client, $id);
    }

}