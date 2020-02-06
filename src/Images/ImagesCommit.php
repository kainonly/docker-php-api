<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesCommit extends Manager
{
    protected array $query = [
        'container' => null,
        'repo' => null,
        'tag' => null,
        'comment' => null,
        'author' => null,
        'pause' => true,
        'changes' => null
    ];
    protected array $body = [
        'Hostname' => null,
        'Domainname' => null,
        'User' => null,
        'AttachStdin' => false,
        'AttachStdout' => true,
        'AttachStderr' => true,
        'ExposedPorts' => null,
        'Tty' => false,
        'OpenStdin' => false,
        'StdinOnce' => false,
        'Env' => null,
        'Cmd' => null,
        'Healthcheck' => null,
        'ArgsEscaped' => null,
        'Image' => null,
        'Volumes' => null,
        'WorkingDir' => null,
        'Entrypoint' => null,
        'NetworkDisabled' => null,
        'MacAddress' => null,
        'OnBuild' => null,
        'Labels' => null,
        'StopSignal' => 'SIGTERM',
        'StopTimeout' => 10,
        'Shell' => null
    ];

    public function setContainer(string $value): self
    {
        $this->query['container'] = $value;
        return $this;
    }

    public function setRepo(string $value): self
    {
        $this->query['repo'] = $value;
        return $this;
    }

    public function setTag(string $value): self
    {
        $this->query['tag'] = $value;
        return $this;
    }

    public function setComment(string $value): self
    {
        $this->query['comment'] = $value;
        return $this;
    }

    public function setAuthor(string $value): self
    {
        $this->query['author'] = $value;
        return $this;
    }

    public function setPause(bool $value): self
    {
        $this->query['pause'] = $value;
        return $this;
    }

    public function setChanges(string $value): self
    {
        $this->query['changes'] = $value;
        return $this;
    }

    public function setHostname(string $value): self
    {
        $this->body['Hostname'] = $value;
        return $this;
    }

    public function setDomainname(string $value): self
    {
        $this->body['Domainname'] = $value;
        return $this;
    }

    public function setUser(string $value): self
    {
        $this->body['User'] = $value;
        return $this;
    }

    public function setAttachStdin(bool $value): self
    {
        $this->body['AttachStdin'] = $value;
        return $this;
    }

    public function setAttachStdout(bool $value): self
    {
        $this->body['AttachStdout'] = $value;
        return $this;
    }

    public function setAttachStderr(bool $value): self
    {
        $this->body['AttachStderr'] = $value;
        return $this;
    }

    public function setExposedPorts(array $value): self
    {
        $this->body['ExposedPorts'] = $value;
        return $this;
    }

    public function setTty(bool $value): self
    {
        $this->body['Tty'] = $value;
        return $this;
    }

    public function setOpenStdin(bool $value): self
    {
        $this->body['OpenStdin'] = $value;
        return $this;
    }

    public function setStdinOnce(bool $value): self
    {
        $this->body['StdinOnce'] = $value;
        return $this;
    }

    public function setEnv(array $value): self
    {
        $this->body['Env'] = $value;
        return $this;
    }

    public function setCmd(array $value): self
    {
        $this->body['Cmd'] = $value;
        return $this;
    }

    public function setHealthcheck(array $value): self
    {
        $this->body['Healthcheck'] = $value;
        return $this;
    }

    public function setArgsEscaped(bool $value): self
    {
        $this->body['ArgsEscaped'] = $value;
        return $this;
    }

    public function setImage(string $value): self
    {
        $this->body['Image'] = $value;
        return $this;
    }

    public function setVolumes(array $value): self
    {
        $this->body['Volumes'] = $value;
        return $this;
    }

    public function setWorkingDir(string $value): self
    {
        $this->body['WorkingDir'] = $value;
        return $this;
    }

    public function setEntrypoint(array $value): self
    {
        $this->body['Entrypoint'] = $value;
        return $this;
    }

    public function setNetworkDisabled(bool $value): self
    {
        $this->body['NetworkDisabled'] = $value;
        return $this;
    }

    public function setMacAddress(string $value): self
    {
        $this->body['MacAddress'] = $value;
        return $this;
    }

    public function setOnBuild(array $value): self
    {
        $this->body['OnBuild'] = $value;
        return $this;
    }

    public function setLabels(array $value): self
    {
        $this->body['Labels'] = $value;
        return $this;
    }

    public function setStopSignal(string $value): self
    {
        $this->body['StopSignal'] = $value;
        return $this;
    }

    public function setStopTimeout(int $value): self
    {
        $this->body['StopTimeout'] = $value;
        return $this;
    }

    public function setShell(array $value): self
    {
        $this->body['Shell'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'commit')
            ->toArray();
    }
}