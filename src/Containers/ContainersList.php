<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;

class ContainersList extends Manager
{
    protected string $method = 'GET';
    protected string $path = 'containers/json';
    protected array $query = [
        'all' => false,
        'limit' => null,
        'size' => false,
        'filters' => null
    ];

    public function setAll(bool $value): self
    {
        $this->query['all'] = $value;
        return $this;
    }

    public function setLimit(int $value): self
    {
        $this->query['limit'] = $value;
        return $this;
    }

    public function setSize(bool $value): self
    {
        $this->query['size'] = $value;
        return $this;
    }

    public function setFilters(array $value): self
    {
        $this->query['filters'] = $this->strings($value);
        return $this;
    }

    public function result(): array
    {
        return $this->send()->toArray();
    }
}