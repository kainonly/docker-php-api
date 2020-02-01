<?php
declare(strict_types=1);

namespace Docker\Api\System;

use Docker\Api\Common\Manager;

class SystemEvents extends Manager
{
    protected array $query = [
        'since' => null,
        'until' => null,
        'filters' => null
    ];

    public function setSince(string $value): self
    {
        $this->query['since'] = $value;
        return $this;
    }

    public function setUntil(string $value): self
    {
        $this->query['until'] = $value;
        return $this;
    }

    public function setFilters(array $value): self
    {
        $this->query['filters'] = $this->strings($value);
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'events')
            ->toArray();
    }
}