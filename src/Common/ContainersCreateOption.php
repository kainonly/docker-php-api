<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

/**
 * Class ContainersCreateOption
 * @package DockerEngineAPI\Common
 * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerCreate
 */
class ContainersCreateOption
{
    /**
     * @var array body
     */
    private array $body = [
        'AttachStdin' => false,
        'AttachStdout' => true,
        'AttachStderr' => true,
        'Tty' => false,
        'OpenStdin' => false,
        'StdinOnce' => false,
        'StopSignal' => 'SIGTERM',
        'StopTimeout' => 10
    ];

    /**
     * The hostname to use for the container, as a valid RFC 1123 hostname.
     * @param string $value
     */
    public function setHostname(string $value): void
    {
        $this->body['Hostname'] = $value;
    }

    /**
     * The domain name to use for the container.
     * @param string $value
     */
    public function setDomainname(string $value): void
    {
        $this->body['Domainname'] = $value;
    }

    /**
     * The user that commands are run as inside the container.
     * @param string $value
     */
    public function setUser(string $value): void
    {
        $this->body['User'] = $value;
    }

    /**
     * Whether to attach to stdin.
     * @param bool $value
     */
    public function setAttachStdin(bool $value): void
    {
        $this->body['AttachStdin'] = $value;
    }

    /**
     * Whether to attach to stdout.
     * @param bool $value
     */
    public function setAttachStdout(bool $value): void
    {
        $this->body['AttachStdout'] = $value;
    }

    /**
     * Whether to attach to stderr.
     * @param bool $value
     */
    public function setAttachStderr(bool $value): void
    {
        $this->body['AttachStderr'] = $value;
    }

    /**
     * An object mapping ports to an empty object in the form:
     * @param array $value {"<port>/<tcp|udp|sctp>": {}}
     */
    public function setExposedPorts(array $value): void
    {
        $this->body['ExposedPorts'] = $value;
    }

    /**
     * Attach standard streams to a TTY, including stdin if it is not closed.
     * @param bool $value
     */
    public function setTty(bool $value): void
    {
        $this->body['Tty'] = $value;
    }

    /**
     * Open stdin
     * @param bool $value
     */
    public function setOpenStdin(bool $value): void
    {
        $this->body['OpenStdin'] = $value;
    }

    /**
     * A list of environment variables to set inside the container in the form ["VAR=value", ...].
     * A variable without = is removed from the environment, rather than to have an empty value.
     * @param string[] $value
     */
    public function setEnv(array $value): void
    {
        $this->body['Env'] = $value;
    }

    /**
     * Command to run specified as a string or an array of strings.
     * @param string[] $value
     */
    public function setCmd(array $value): void
    {
        $this->body['Cmd'] = $value;
    }

    /**
     * A test to perform to check that the container is healthy.
     * @param array $value
     */
    public function setHealthcheck(array $value): void
    {
        $this->body['Healthcheck'] = $value;
    }

    /**
     * Command is already escaped (Windows only).
     * @param bool $value
     */
    public function setArgsEscaped(bool $value): void
    {
        $this->body['ArgsEscaped'] = $value;
    }

    /**
     * The name of the image to use when creating the container.
     * @param string $value
     */
    public function setImage(string $value): void
    {
        $this->body['Image'] = $value;
    }

    /**
     * An object mapping mount point paths inside the container to empty objects.
     * @param array $value
     */
    public function setVolumes(array $value): void
    {
        $this->body['Volumes'] = $value;
    }

    /**
     * The working directory for commands to run in.
     * @param string $value
     */
    public function setWorkingDir(string $value): void
    {
        $this->body['WorkingDir'] = $value;
    }

    /**
     * The entry point for the container as a string or an array of strings.
     * @param string[] $value
     */
    public function setEntrypoint(array $value): void
    {
        $this->body['Entrypoint'] = $value;
    }

    /**
     * Disable networking for the container.
     * @param bool $value
     */
    public function setNetworkDisabled(bool $value): void
    {
        $this->body['NetworkDisabled'] = $value;
    }

    /**
     * MAC address of the container.
     * @param string $value
     */
    public function setMacAddress(string $value): void
    {
        $this->body['MacAddress'] = $value;
    }

    /**
     * ONBUILD metadata that were defined in the image's Dockerfile.
     * @param string[] $value
     */
    public function setOnBuild(array $value): void
    {
        $this->body['OnBuild'] = $value;
    }

    /**
     * User-defined key/value metadata.
     * @param array $value
     */
    public function setLabels(array $value): void
    {
        $this->body['Labels'] = $value;
    }

    /**
     * Signal to stop a container as a string or unsigned integer.
     * @param string $value
     */
    public function setStopSignal(string $value): void
    {
        $this->body['StopSignal'] = $value;
    }

    /**
     * Timeout to stop a container in seconds.
     * @param int $value
     */
    public function setStopTimeout(int $value): void
    {
        $this->body['StopTimeout'] = $value;
    }

    /**
     * Shell for when RUN, CMD, and ENTRYPOINT uses a shell.
     * @param string[] $value
     */
    public function setShell(array $value): void
    {
        $this->body['Shell'] = $value;
    }

    /**
     * Container configuration that depends on the host we are running on
     * @param array $value
     */
    public function setHostConfig(array $value): void
    {
        $this->body['HostConfig'] = $value;
    }

    /**
     * This container's networking configuration.
     * @param array $value
     */
    public function setNetworkingConfig(array $value): void
    {
        $this->body['NetworkingConfig'] = $value;
    }
}