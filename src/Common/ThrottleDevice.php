<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ThrottleDevice
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * Device path
     * @param string $value
     */
    public function setPath(string $value): void
    {
        $this->body['Path'] = $value;
    }

    /**
     * Rate
     * @param int $value
     */
    public function setRate(int $value): void
    {
        $this->body['Rate'] = $value;
    }

    /**
     * ThrottleDevice valueof
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }
}