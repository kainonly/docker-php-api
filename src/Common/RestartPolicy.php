<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class RestartPolicy
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * """always""unless-stopped""on-failure"
     * @param string $value
     */
    public function setName(string $value): void
    {
        $this->body['Name'] = $value;
    }

    /**
     * If on-failure is used,
     * the number of times to retry before giving up
     * @param int $value
     */
    public function setMaximumRetryCount(int $value): void
    {
        $this->body['MaximumRetryCount'] = $value;
    }

    /**
     * RestartPolicy valueof
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }

}