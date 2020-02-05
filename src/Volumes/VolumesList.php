<?php
declare(strict_types=1);

namespace Docker\Api\Volumes;

use Docker\Api\Common\Manager;

class VolumesList extends Manager
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
            ->send('GET', 'volumes')
            ->toArray();
    }
}