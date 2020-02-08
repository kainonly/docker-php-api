<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersUpdate extends Manager
{
    private string $id;
    protected array $body = [
        'CpuShares' => null,
        'Memory' => 0,
        'CgroupParent' => null,
        'BlkioWeight' => null,
        'BlkioWeightDevice' => null,
        'BlkioDeviceReadBps' => null,
        'BlkioDeviceWriteBps' => null,
        'BlkioDeviceReadIOps' => null,
        'BlkioDeviceWriteIOps' => null,
        'CpuPeriod' => null,
        'CpuQuota' => null,
        'CpuRealtimePeriod' => null,
        'CpuRealtimeRuntime' => null,
        'CpusetCpus' => null,
        'CpusetMems' => null,
        'Devices' => null,
        'DeviceCgroupRules' => null,
        'DeviceRequests' => null,
        'KernelMemory' => null,
        'KernelMemoryTCP' => null,
        'MemoryReservation' => null,
        'MemorySwap' => null,
        'MemorySwappiness' => null,
        'NanoCPUs' => null,
        'OomKillDisable' => null,
        'Init' => null,
        'PidsLimit' => null,
        'Ulimits' => null,
        'CpuCount' => null,
        'CpuPercent' => null,
        'IOMaximumIOps' => null,
        'IOMaximumBandwidth' => null,
        'RestartPolicy' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setCpuShares(int $value): self
    {
        $this->body['CpuShares'] = $value;
        return $this;
    }

    public function setMemory(int $value): self
    {
        $this->body['Memory'] = $value;
        return $this;
    }

    public function setCgroupParent(string $value): self
    {
        $this->body['CgroupParent'] = $value;
        return $this;
    }

    public function setBlkioWeight(int $value): self
    {
        $this->body['BlkioWeight'] = $value;
        return $this;
    }

    public function setBlkioWeightDevice(array $value): self
    {
        $this->body['BlkioWeightDevice'] = $value;
        return $this;
    }

    public function setBlkioDeviceReadBps(array $value): self
    {
        $this->body['BlkioDeviceReadBps'] = $value;
        return $this;
    }

    public function setBlkioDeviceWriteBps(array $value): self
    {
        $this->body['BlkioDeviceWriteBps'] = $value;
        return $this;
    }

    public function setBlkioDeviceReadIOps(array $value): self
    {
        $this->body['BlkioDeviceReadIOps'] = $value;
        return $this;
    }

    public function setBlkioDeviceWriteIOps(array $value): self
    {
        $this->body['BlkioDeviceWriteIOps'] = $value;
        return $this;
    }

    public function setCpuPeriod(int $value): self
    {
        $this->body['CpuPeriod'] = $value;
        return $this;
    }

    public function setCpuQuota(int $value): self
    {
        $this->body['CpuQuota'] = $value;
        return $this;
    }

    public function setCpuRealtimePeriod(int $value): self
    {
        $this->body['CpuRealtimePeriod'] = $value;
        return $this;
    }

    public function setCpuRealtimeRuntime(int $value): self
    {
        $this->body['CpuRealtimeRuntime'] = $value;
        return $this;
    }

    public function setCpusetCpus(string $value): self
    {
        $this->body['CpusetCpus'] = $value;
        return $this;
    }

    public function setCpusetMems(string $value): self
    {
        $this->body['CpusetMems'] = $value;
        return $this;
    }

    public function setDevices(array $value): self
    {
        $this->body['Devices'] = $value;
        return $this;
    }

    public function setDeviceCgroupRules(array $value): self
    {
        $this->body['DeviceCgroupRules'] = $value;
        return $this;
    }

    public function setDeviceRequests(array $value): self
    {
        $this->body['DeviceRequests'] = $value;
        return $this;
    }

    public function setKernelMemory(int $value): self
    {
        $this->body['KernelMemory'] = $value;
        return $this;
    }

    public function setKernelMemoryTCP(int $value): self
    {
        $this->body['KernelMemoryTCP'] = $value;
        return $this;
    }

    public function setMemoryReservation(int $value): self
    {
        $this->body['MemoryReservation'] = $value;
        return $this;
    }

    public function setMemorySwap(int $value): self
    {
        $this->body['MemorySwap'] = $value;
        return $this;
    }

    public function setMemorySwappiness(int $value): self
    {
        $this->body['MemorySwappiness'] = $value;
        return $this;
    }

    public function setNanoCPUs(int $value): self
    {
        $this->body['NanoCPUs'] = $value;
        return $this;
    }

    public function setOomKillDisable(bool $value): self
    {
        $this->body['OomKillDisable'] = $value;
        return $this;
    }

    public function setInit(bool $value): self
    {
        $this->body['Init'] = $value;
        return $this;
    }

    public function setPidsLimit(int $value): self
    {
        $this->body['PidsLimit'] = $value;
        return $this;
    }

    public function setUlimits(array $value): self
    {
        $this->body['Ulimits'] = $value;
        return $this;
    }

    public function setCpuCount(int $value): self
    {
        $this->body['CpuCount'] = $value;
        return $this;
    }

    public function setCpuPercent(int $value): self
    {
        $this->body['CpuPercent'] = $value;
        return $this;
    }

    public function setIOMaximumIOps(int $value): self
    {
        $this->body['IOMaximumIOps'] = $value;
        return $this;
    }

    public function setIOMaximumBandwidth(int $value): self
    {
        $this->body['IOMaximumBandwidth'] = $value;
        return $this;
    }

    public function setRestartPolicy(array $value): self
    {
        $this->body['RestartPolicy'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/update')
            ->toArray();
    }
}