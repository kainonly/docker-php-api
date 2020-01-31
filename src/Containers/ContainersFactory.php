<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Factory;

class ContainersFactory extends Factory
{
    public ContainersList $list;
    public ContainersCreate $create;

    protected function factorys(): void
    {
        $this->list = new ContainersList($this->client);
        $this->create = new ContainersCreate($this->client);
    }
}