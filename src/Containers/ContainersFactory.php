<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Factory;

class ContainersFactory extends Factory
{
    public function list(): ContainersList
    {
        return new ContainersList($this->client);
    }

    public function create(): ContainersCreate
    {
        return new ContainersCreate($this->client);
    }
}