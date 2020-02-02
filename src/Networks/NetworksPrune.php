<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;

class NetworksPrune extends Manager
{
    protected array $query = [
        'filters' => null
    ];

    public function setFilters(array $value): self
    {
        $this->query['filters'] = $this->strings($value);
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'networks/prune')
            ->toArray();
    }
}