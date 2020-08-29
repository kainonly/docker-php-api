<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ContainersUpdateOption
{
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

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     * @param int $value
     */
    public function setCpuQuota(int $value): void
    {
        $this->body['CpuQuota'] = $value;
    }

    /**
     * The length of a CPU real-time period in microseconds.
     * Set to 0 to allocate no time allocated to real-time tasks.
     * @param int $value
     */
    public function setCpuRealtimePeriod(int $value): void
    {
        $this->body['CpuRealtimePeriod'] = $value;
    }

    /**
     * The length of a CPU real-time runtime in microseconds.
     * Set to 0 to allocate no time allocated to real-time tasks.
     * @param int $value
     */
    public function setCpuRealtimeRuntime(int $value): void
    {
        $this->body['CpuRealtimeRuntime'] = $value;
    }

    /**
     * CPUs in which to allow execution (e.g., 0-3, 0,1)
     * @param string $value
     */
    public function setCpusetCpus(string $value): void
    {
        $this->body['CpusetCpus'] = $value;
    }

    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only effective on NUMA systems.
     * @param string $value
     */
    public function setCpusetMems(string $value): void
    {
        $this->body['CpusetMems'] = $value;
    }

    /**
     * A list of devices to add to the container.
     * @param array $value
     */
    public function setDevices(array $value): void
    {
        $this->body['Devices'] = $value;
    }

    /**
     * a list of cgroup rules to apply to the container
     * @param array $value
     */
    public function setDeviceCgroupRules(array $value): void
    {
        $this->body['DeviceCgroupRules'] = $value;
    }

    /**
     * Disk limit (in bytes).
     * @param int $value
     */
    public function setDiskQuota(int $value): void
    {
        $this->body['DiskQuota'] = $value;
    }

    /**
     * Kernel memory limit in bytes.
     * @param int $value
     */
    public function setKernelMemory(int $value): void
    {
        $this->body['KernelMemory'] = $value;
    }

    /**
     * Memory soft limit in bytes.
     * @param int $value
     */
    public function setMemoryReservation(int $value): void
    {
        $this->body['MemoryReservation'] = $value;
    }

    /**
     * Total memory limit (memory + swap).
     * Set as -1 to enable unlimited swap.
     * @param int $value
     */
    public function setMemorySwap(int $value): void
    {
        $this->body['MemorySwap'] = $value;
    }

    /**
     * Tune a container's memory swappiness behavior.
     * Accepts an integer between 0 and 100.
     * @param int $value
     */
    public function setMemorySwappiness(int $value): void
    {
        $this->body['MemorySwappiness'] = $value;
    }

    /**
     * CPU quota in units of 10-9 CPUs.
     * @param int $value
     */
    public function setNanoCPUs(int $value): void
    {
        $this->body['NanoCPUs'] = $value;
    }

    /**
     * Disable OOM Killer for the container.
     * @param bool $value
     */
    public function setOomKillDisable(bool $value): void
    {
        $this->body['OomKillDisable'] = $value;
    }

    /**
     * Run an init inside the container that forwards signals and reaps processes.
     * This field is omitted if empty, and the default (as configured on the daemon) is used.
     * @param bool $value
     */
    public function setInit(bool $value): void
    {
        $this->body['Init'] = $value;
    }

    /**
     * Tune a container's pids limit.
     * Set -1 for unlimited.
     * @param int $value
     */
    public function setPidsLimit(int $value): void
    {
        $this->body['PidsLimit'] = $value;
    }

    /**
     * A list of resource limits to set in the container.
     * For example: {"Name": "nofile", "Soft": 1024, "Hard": 2048}"
     * @param array $value
     */
    public function setUlimits(array $value): void
    {
        $this->body['Ulimits'] = $value;
    }

    /**
     * The number of usable CPUs (Windows only).
     * @param int $value
     */
    public function setCpuCount(int $value): void
    {
        $this->body['CpuCount'] = $value;
    }

    /**
     * The usable percentage of the available CPUs (Windows only).
     * @param int $value
     */
    public function setCpuPercent(int $value): void
    {
        $this->body['CpuPercent'] = $value;
    }

    /**
     * Maximum IOps for the container system drive (Windows only)
     * @param int $value
     */
    public function setIOMaximumIOps(int $value): void
    {
        $this->body['IOMaximumIOps'] = $value;
    }

    /**
     * Maximum IO in bytes per second for the container system drive (Windows only)
     * @param int $value
     */
    public function setIOMaximumBandwidth(int $value): void
    {
        $this->body['IOMaximumBandwidth'] = $value;
    }

    /**
     * The behavior to apply when the container exits.
     * The default is not to restart.
     * @param array $value
     */
    public function setRestartPolicy(array $value): void
    {
        $this->body['RestartPolicy'] = $value;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }
}