<?php
declare(strict_types=1);

namespace Docker\Api\Exec;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ExecExec extends Manager
{
    private string $id;
    protected array $body = [
        'AttachStdin' => null,
        'AttachStdout' => null,
        'AttachStderr' => null,
        'DetachKeys' => null,
        'Tty' => null,
        'Env' => null,
        'Cmd' => null,
        'Privileged' => false,
        'User' => null,
        'WorkingDir' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
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

    public function setDetachKeys(string $value): self
    {
        $this->body['DetachKeys'] = $value;
        return $this;
    }

    public function setTty(bool $value): self
    {
        $this->body['Tty'] = $value;
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

    public function setPrivileged(bool $value): self
    {
        $this->body['Privileged'] = $value;
        return $this;
    }

    public function setUser(string $value): self
    {
        $this->body['User'] = $value;
        return $this;
    }

    public function setWorkingDir(string $value): self
    {
        $this->body['WorkingDir'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/exec')
            ->toArray();
    }
}