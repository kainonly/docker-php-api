<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class HealthConfig
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * The test to perform. Possible values are:
     * [] inherit healthcheck from image or parent image
     * ["NONE"] disable healthcheck
     * ["CMD", args...] exec arguments directly
     * ["CMD-SHELL", command] run command with system's default shell
     * @param string[] $value
     */
    public function setTest(array $value): void
    {
        $this->body['Test'] = $value;
    }

    /**
     * The time to wait between checks in nanoseconds.
     * It should be 0 or at least 1000000 (1 ms). 0 means inherit.
     * @param int $value
     */
    public function setInterval(int $value): void
    {
        $this->body['Interval'] = $value;
    }

    /**
     * The time to wait before considering the check to have hung.
     * It should be 0 or at least 1000000 (1 ms). 0 means inherit.
     * @param int $value
     */
    public function setTimeout(int $value): void
    {
        $this->body['Timeout'] = $value;
    }

    /**
     * The number of consecutive failures needed to consider a container as unhealthy.
     * 0 means inherit.
     * @param int $value
     */
    public function setRetries(int $value): void
    {
        $this->body['Retries'] = $value;
    }

    /**
     * Start period for the container to initialize before starting health-retries countdown in nanoseconds.
     * It should be 0 or at least 1000000 (1 ms). 0 means inherit.
     * @param int $value
     */
    public function setStartPeriod(int $value): void
    {
        $this->body['StartPeriod'] = $value;
    }

    /**
     * HealthConfig value
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }
}