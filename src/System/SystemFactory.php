<?php
declare(strict_types=1);

namespace Docker\Api\System;

use Docker\Api\Common\Factory;

class SystemFactory extends Factory
{
    public function auth(string $username, string $password): SystemAuth
    {
        return new SystemAuth($this->client, $username, $password);
    }

    public function info(): SystemInfo
    {
        return new SystemInfo($this->client);
    }

    public function version(): SystemVersion
    {
        return new SystemVersion($this->client);
    }

    public function ping(): SystemPing
    {
        return new SystemPing($this->client);
    }

    public function events(): SystemEvents
    {
        return new SystemEvents($this->client);
    }

    public function df(): SystemDf
    {
        return new SystemDf($this->client);
    }
}