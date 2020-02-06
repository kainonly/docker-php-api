<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesExports extends Manager
{
    protected array $query = [
        'names' => null,
    ];

    public function setNames(array $value): self
    {
        $this->query['names'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('GET', 'images/get')
            ->toString();
    }
}