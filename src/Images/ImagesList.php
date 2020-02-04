<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesList extends Manager
{
    protected array $query = [
        'all' => false,
        'filters' => null,
        'digests' => false
    ];

    public function setAll(bool $value): self
    {
        $this->query['all'] = $value;
        return $this;
    }

    public function setFilters(array $value): self
    {
        $this->query['filters'] = $this->strings($value);
        return $this;
    }

    public function setDigests(bool $value): self
    {
        $this->query['digests'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'images/json')
            ->toArray();
    }
}