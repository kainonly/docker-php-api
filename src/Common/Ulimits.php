<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class Ulimits
{
    private array $body = [];

    /**
     * Name of ulimit
     * @param string $value
     */
    public function setName(string $value): void
    {
        $this->body['Name'] = $value;
    }

    /**
     * Soft limit
     * @param int $value
     */
    public function setSoft(int $value): void
    {
        $this->body['Soft'] = $value;
    }

    /**
     * Hard limit
     * @param int $value
     */
    public function setHard(int $value): void
    {
        $this->body['Hard'] = $value;
    }

    /**
     * Ulimits valueof
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }

}