<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersLogs extends Manager
{
    private string $id;
    protected array $query = [
        'follow' => false,
        'stdout' => false,
        'stderr' => false,
        'since' => 0,
        'until' => 0,
        'timestamps' => false,
        'tail' => 'all'
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setFollow(bool $value): self
    {
        $this->query['follow'] = $value;
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

    public function setSince(int $value): self
    {
        $this->query['since'] = $value;
        return $this;
    }

    public function setUntil(int $value): self
    {
        $this->query['until'] = $value;
        return $this;
    }

    public function setTimestamps(bool $value): self
    {
        $this->query['timestamps'] = $value;
        return $this;
    }

    public function setTail(string $value): self
    {
        $this->query['tail'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'containers/' . $this->id . '/logs')
            ->toArray();
    }
}