<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersAttach extends Manager
{
    private string $id;
    protected array $query = [
        'detachKeys' => null,
        'logs' => false,
        'stream' => false,
        'stdin' => false,
        'stdout' => false,
        'stderr' => false
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setDetachKeys(string $value): self
    {
        $this->query['detachKeys'] = $value;
        return $this;
    }

    public function setLogs(bool $value): self
    {
        $this->query['logs'] = $value;
        return $this;
    }

    public function setStream(bool $value): self
    {
        $this->query['stream'] = $value;
        return $this;
    }

    public function setStdin(bool $value): self
    {
        $this->query['stdin'] = $value;
        return $this;
    }

    public function setStdout(bool $value): self
    {
        $this->query['stdout'] = $value;
        return $this;
    }

    public function setStderr(bool $value): self
    {
        $this->query['stderr'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/attach')
            ->isOk();
    }
}