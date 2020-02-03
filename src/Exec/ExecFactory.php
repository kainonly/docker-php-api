<?php
declare(strict_types=1);

namespace Docker\Api\Exec;

use Docker\Api\Common\Factory;

class ExecFactory extends Factory
{
    public function exec(string $id): ExecExec
    {
        return new ExecExec($this->client, $id);
    }

    public function start(string $id): ExecStart
    {
        return new ExecStart($this->client, $id);
    }

    public function resize(string $id): ExecResize
    {
        return new ExecResize($this->client, $id);
    }

    public function inspect(string $id): ExecInspect
    {
        return new ExecInspect($this->client, $id);
    }
}