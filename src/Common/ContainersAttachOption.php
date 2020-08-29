<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ContainersAttachOption
{
    private array $query = [
        'logs' => false,
        'stream' => false,
        'stdin' => false,
        'stdout' => false,
        'stderr' => false
    ];

    /**
     * Override the key sequence for detaching a container.
     * Format is a single character [a-Z] or ctrl-<value> where <value> is one of: a-z, @, ^, [, , or _.
     * @param string $value
     */
    public function setDetachKeys(string $value): void
    {
        $this->query['detachKeys'] = $value;
    }

    /**
     * Replay previous logs from the container.
     * @param bool $value
     */
    public function setLogs(bool $value): void
    {
        $this->query['logs'] = $value;
    }

    /**
     * Stream attached streams from the time the request was made onwards
     * @param bool $value
     */
    public function setStream(bool $value): void
    {
        $this->query['stream'] = $value;
    }

    /**
     * Attach to stdin
     * @param bool $value
     */
    public function setStdin(bool $value): void
    {
        $this->query['stdin'] = $value;
    }

    /**
     * Attach to stdout
     * @param bool $value
     */
    public function setStdout(bool $value): void
    {
        $this->query['stdout'] = $value;
    }

    /**
     * Attach to stderr
     * @param bool $value
     */
    public function setStderr(bool $value): void
    {
        $this->query['stderr'] = $value;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }
}