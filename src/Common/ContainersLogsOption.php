<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ContainersLogsOption extends CommonOption
{
    protected array $query = [
        'follow' => false,
        'stdout' => false,
        'stderr' => false,
        'since' => 0,
        'until' => 0,
        'timestamps' => false,
        'tail' => 'all'
    ];

    /**
     * Return the logs as a stream.
     * @param bool $value
     */
    public function setFollow(bool $value): void
    {
        $this->query['follow'] = $value;
    }

    /**
     * Return logs from stdout
     * @param bool $value
     */
    public function setStdout(bool $value): void
    {
        $this->query['stdout'] = $value;
    }

    /**
     * Return logs from stderr
     * @param bool $value
     */
    public function setStderr(bool $value): void
    {
        $this->query['stderr'] = $value;
    }

    /**
     * Only return logs since this time, as a UNIX timestamp
     * @param int $value
     */
    public function setSince(int $value): void
    {
        $this->query['since'] = $value;
    }

    /**
     * Only return logs before this time, as a UNIX timestamp
     * @param int $value
     */
    public function setUntil(int $value): void
    {
        $this->query['until'] = $value;
    }

    /**
     * Add timestamps to every log line
     * @param bool $value
     */
    public function setTimestamps(bool $value): void
    {
        $this->query['timestamps'] = $value;
    }

    /**
     * Only return this number of log lines from the end of the logs.
     * Specify as an integer or all to output all log lines.
     * @param string $value
     */
    public function setTail(string $value): void
    {
        $this->query['tail'] = $value;
    }
}