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

    public function inspect(string $id): ContainersInspect
    {
        return new ContainersInspect($this->client, $id);
    }

    public function top(string $id): ContainersTop
    {
        return new ContainersTop($this->client, $id);
    }

    public function logs(string $id): ContainersLogs
    {
        return new ContainersLogs($this->client, $id);
    }

    public function changes(string $id): ContainersChanges
    {
        return new ContainersChanges($this->client, $id);
    }

    public function export(string $id): ContainersExport
    {
        return new ContainersExport($this->client, $id);
    }

    public function stats(string $id): ContainersStats
    {
        return new ContainersStats($this->client, $id);
    }

    public function resize(string $id): ContainersResize
    {
        return new ContainersResize($this->client, $id);
    }

    public function start(string $id): ContainersStart
    {
        return new ContainersStart($this->client, $id);
    }

    public function stop(string $id): ContainersStop
    {
        return new ContainersStop($this->client, $id);
    }

    public function restart(string $id): ContainersRestart
    {
        return new ContainersRestart($this->client, $id);
    }


}