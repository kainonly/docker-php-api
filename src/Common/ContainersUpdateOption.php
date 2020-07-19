<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ContainersUpdateOption
{
    /**
     * @var array|int[]
     */
    private array $body = [
        'Memory' => 0
    ];

    /**
     * An integer value representing this container's relative CPU weight versus other containers.
     * @param int $value
     */
    public function setCpuShares(int $value): void
    {
        $this->body['CpuShares'] = $value;
    }

    /**
     * Memory limit in bytes.
     * @param int $value
     */
    public function setMemory(int $value): void
    {
        $this->body['Memory'] = $value;
    }

    /**
     * Path to cgroups under which the container's cgroup is created.
     * If the path is not absolute, the path is considered to be relative to the cgroups path of the init process.
     * Cgroups are created if they do not already exist.
     * @param string $value
     */
    public function setCgroupParent(string $value): void
    {
        $this->body['CgroupParent'] = $value;
    }

    /**
     * Block IO weight (relative weight).
     * @param int $value
     */
    public function setBlkioWeight(int $value): void
    {
        $this->body['BlkioWeight'] = $value;
    }

    /**
     * Block IO weight (relative device weight) in the form [{"Path": "device_path", "Weight": weight}].
     * @param array $value
     */
    public function setBlkioWeightDevice(array $value): void
    {
        $this->body['BlkioWeightDevice'] = $value;
    }

    /**
     * Limit read rate (bytes per second) from a device, in the form [{"Path": "device_path", "Rate": rate}].
     * @param array $value
     */
    public function setBlkioDeviceReadBps(array $value): void
    {
        $this->body['BlkioDeviceReadBps'] = $value;
    }

    /**
     * Limit write rate (bytes per second) to a device, in the form [{"Path": "device_path", "Rate": rate}].
     * @param array $value
     */
    public function setBlkioDeviceWriteBps(array $value): void
    {
        $this->body['BlkioDeviceWriteBps'] = $value;
    }

    /**
     * Limit read rate (IO per second) from a device, in the form [{"Path": "device_path", "Rate": rate}].
     * @param array $value
     */
    public function setBlkioDeviceReadIOps(array $value): void
    {
        $this->body['BlkioDeviceReadIOps'] = $value;
    }

    /**
     * Limit write rate (IO per second) to a device, in the form [{"Path": "device_path", "Rate": rate}].
     * @param array $value
     */
    public function setBlkioDeviceWriteIOps(array $value): void
    {
        $this->body['BlkioDeviceWriteIOps'] = $value;
    }

    /**
     * The length of a CPU period in microseconds.
     * @param int $value
     */
    public function setCpuPeriod(int $value): void
    {
        $this->body['CpuPeriod'] = $value;
    }
}