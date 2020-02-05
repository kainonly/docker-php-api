<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesBuild extends Manager
{
    protected array $headers = [
        'Content-type' => 'application/x-tar',
        'X-Registry-Config' => null
    ];
    protected array $query = [
        'dockerfile' => 'Dockerfile',
        't' => null,
        'extrahosts' => null,
        'remote' => null,
        'q' => false,
        'nocache' => false,
        'cachefrom' => null,
        'pull' => null,
        'rm' => true,
        'forcerm' => false,
        'memory' => null,
        'memswap' => null,
        'cpushares' => null,
        'cpusetcpus' => null,
        'cpuperiod' => null,
        'cpuquota' => null,
        'buildargs' => null,
        'shmsize' => null,
        'squash' => null,
        'labels' => null,
        'networkmode' => null,
        'platform' => ''
    ];

    public function setDockerfile(string $value): self
    {
        $this->query['dockerfile'] = $value;
        return $this;
    }

    public function setTag(string $value): self
    {
        $this->query['t'] = $value;
        return $this;
    }

    public function setExtrahosts(string $value): self
    {
        $this->query['extrahosts'] = $value;
        return $this;
    }

    public function setRemote(string $value): self
    {
        $this->query['remote'] = $value;
        return $this;
    }

    public function setVerbose(bool $value): self
    {
        $this->query['q'] = $value;
        return $this;
    }

    public function setNocache(bool $value): self
    {
        $this->query['nocache'] = $value;
        return $this;
    }

    public function setCachefrom(string $value): self
    {
        $this->query['cachefrom'] = $value;
        return $this;
    }

    public function setPull(string $value): self
    {
        $this->query['pull'] = $value;
        return $this;
    }

    public function setRm(bool $value): self
    {
        $this->query['rm'] = $value;
        return $this;
    }

    public function setForcerm(bool $value): self
    {
        $this->query['forcerm'] = $value;
        return $this;
    }

    public function setMemory(int $value): self
    {
        $this->query['memory'] = $value;
        return $this;
    }

    public function setMemswap(int $value): self
    {
        $this->query['memswap'] = $value;
        return $this;
    }

    public function setCpushares(int $value): self
    {
        $this->query['cpushares'] = $value;
        return $this;
    }

    public function setCpusetcpus(int $value): self
    {
        $this->query['cpusetcpus'] = $value;
        return $this;
    }

    public function setCpuperiod(int $value): self
    {
        $this->query['cpuperiod'] = $value;
        return $this;
    }

    public function setCpuquota(int $value): self
    {
        $this->query['cpuquota'] = $value;
        return $this;
    }

    public function setBuildargs(string $value): self
    {
        $this->query['buildargs'] = $value;
        return $this;
    }

    public function setShmsize(int $value): self
    {
        $this->query['shmsize'] = $value;
        return $this;
    }

    public function setSquash(bool $value): self
    {
        $this->query['squash'] = $value;
        return $this;
    }

    public function setLabels(string $value): self
    {
        $this->query['labels'] = $value;
        return $this;
    }

    public function setNetworkmode(string $value): self
    {
        $this->query['networkmode'] = $value;
        return $this;
    }

    public function setPlatform(string $value): self
    {
        $this->query['platform'] = $value;
        return $this;
    }

    public function setContenttype(string $value): self
    {
        $this->headers['Content-type'] = $value;
        return $this;
    }

    public function setXRegistryConfig(string $value): self
    {
        $this->headers['X-Registry-Config'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'build')
            ->toString();
    }

}