<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ImagesBuildOption extends CommonOption
{
    use RegistryConfig;

    protected array $header = [
        'Content-type' => 'application/x-tar'
    ];
    protected array $query = [
        'dockerfile' => 'Dockerfile',
        'q' => false,
        'nocache' => false,
        'rm' => true,
        'forcerm' => false,
        'platform' => '',
        'target' => ''
    ];

    /**
     * Path within the build context to the Dockerfile.
     * @param string $value
     */
    public function setDockerfile(string $value): void
    {
        $this->query['dockerfile'] = $value;
    }

    /**
     * A name and optional tag to apply to the image in the name:tag format.
     * @param string $value
     */
    public function setTag(string $value): void
    {
        $this->query['t'] = $value;
    }

    /**
     * Extra hosts to add to /etc/hosts
     * @param string $value
     */
    public function setExtrahosts(string $value): void
    {
        $this->query['extrahosts'] = $value;
    }

    /**
     * A Git repository URI or HTTP/HTTPS context URI
     * @param string $value
     */
    public function setRemote(string $value): void
    {
        $this->query['remote'] = $value;
    }

    /**
     * Suppress verbose build output.
     * @param bool $value
     */
    public function setVerbose(bool $value): void
    {
        $this->query['q'] = $value;
    }

    /**
     * Do not use the cache when building the image.
     * @param bool $value
     */
    public function setNocache(bool $value): void
    {
        $this->query['nocache'] = $value;
    }

    /**
     * JSON array of images used for build cache resolution.
     * @param string $value
     */
    public function setCachefrom(string $value): void
    {
        $this->query['cachefrom'] = $value;
    }

    /**
     * Attempt to pull the image even if an older image exists locally.
     * @param string $value
     */
    public function setPull(string $value): void
    {
        $this->query['pull'] = $value;
    }

    /**
     * Remove intermediate containers after a successful build.
     * @param bool $value
     */
    public function setRemove(bool $value): void
    {
        $this->query['rm'] = $value;
    }

    /**
     * Always remove intermediate containers, even upon failure.
     * @param bool $value
     */
    public function setForceRemove(bool $value): void
    {
        $this->query['forcerm'] = $value;
    }

    /**
     * Set memory limit for build.
     * @param int $value
     */
    public function setMemory(int $value): void
    {
        $this->query['memory'] = $value;
    }

    /**
     * Total memory (memory + swap). Set as -1 to disable swap.
     * @param int $value
     */
    public function setMemswap(int $value): void
    {
        $this->query['memswap'] = $value;
    }

    /**
     * CPU shares (relative weight).
     * @param int $value
     */
    public function setCpushares(int $value): void
    {
        $this->query['cpushares'] = $value;
    }

    /**
     * CPUs in which to allow execution (e.g., 0-3, 0,1).
     * @param string $value
     */
    public function setCpusetcpus(string $value): void
    {
        $this->query['cpusetcpus'] = $value;
    }

    /**
     * The length of a CPU period in microseconds.
     * @param int $value
     */
    public function setCpuperiod(int $value): void
    {
        $this->query['cpuperiod'] = $value;
    }

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     * @param int $value
     */
    public function setCpuquota(int $value): void
    {
        $this->query['cpuquota'] = $value;
    }

    /**
     * JSON map of string pairs for build-time variables
     * @param array $value
     */
    public function setBuildargs(array $value): void
    {
        $this->query['buildargs'] = json_encode($value);
    }

    /**
     * Size of /dev/shm in bytes.
     * @param int $value
     */
    public function setShmsize(int $value): void
    {
        $this->query['shmsize'] = $value;
    }

    /**
     * Squash the resulting images layers into a single layer
     * @param bool $value
     */
    public function setSquash(bool $value): void
    {
        $this->query['squash'] = $value;
    }

    /**
     * Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
     * @param array $value
     */
    public function setLabel(array $value): void
    {
        $this->query['label'] = json_encode($value);
    }

    /**
     * Sets the networking mode for the run commands during build
     * @param string $value
     */
    public function setNetworkmode(string $value): void
    {
        $this->query['networkmode'] = $value;
    }

    /**
     * Platform in the format os[/arch[/variant]]
     * @param string $value
     */
    public function setPlatform(string $value): void
    {
        $this->query['platform'] = $value;
    }

    /**
     * Target build stage
     * @param string $value
     */
    public function setTarget(string $value): void
    {
        $this->query['target'] = $value;
    }
}