<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesSearch extends Manager
{
    protected array $query = [
        'term' => null,
        'limit' => null,
        'filters' => null
    ];

    public function setTerm(string $value): self
    {
        $this->query['term'] = $value;
        return $this;
    }

    public function setLimit(int $value): self
    {
        $this->query['limit'] = $value;
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
            ->send('POST', 'build/search')
            ->toArray();
    }

}