<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class DeviceMapping
{
    /**
     * @var array
     */
    private array $body = [];

    /**
     * @param string $value
     */
    public function setPathOnHost(string $value): void
    {
        $this->body['PathOnHost'] = $value;
    }

    /**
     * @param string $value
     */
    public function setPathInContainer(string $value): void
    {
        $this->body['PathInContainer'] = $value;
    }

    /**
     * @param string $value
     */
    public function setCgroupPermissions(string $value): void
    {
        $this->body['CgroupPermissions'] = $value;
    }

    /**
     * DeviceMapping
     * @return array
     */
    public function valueOf(): array
    {
        return $this->body;
    }

}