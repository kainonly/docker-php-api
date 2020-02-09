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

    public function kill(string $id): ContainersKill
    {
        return new ContainersKill($this->client, $id);
    }

    public function update(string $id): ContainersUpdate
    {
        return new ContainersUpdate($this->client, $id);
    }

    public function rename(string $id): ContainersRename
    {
        return new ContainersRename($this->client, $id);
    }

    public function pause(string $id): ContainersPause
    {
        return new ContainersPause($this->client, $id);
    }

    public function unpause(string $id): ContainersUnpause
    {
        return new ContainersUnpause($this->client, $id);
    }

    public function attach(string $id): ContainersAttach
    {
        return new ContainersAttach($this->client, $id);
    }


}