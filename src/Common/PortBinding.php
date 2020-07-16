<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class PortBinding
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * Host IP address that the container's port is mapped to.
     * @param string $value
     */
    public function setHostIp(string $value): void
    {
        $this->body['HostIp'] = $value;
    }

    /**
     * Host port number that the container's port is mapped to.
     * @param string $value
     */
    public function setHostPort(string $value): void
    {
        $this->body['HostPort'] = $value;
    }

    /**
     * PortBinding valueOf
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }
}