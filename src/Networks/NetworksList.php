<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Manager;

class NetworksList extends Manager
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
            ->send('GET', 'networks')
            ->toArray();
    }
}