<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\DockerManager;

class ImagesFactory extends DockerManager
{
    public function list(
        bool $all = false,
        array $filters = [],
        bool $digests = false
    ): array
    {
        $query = [];
        $query['all'] = $all;
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        $query['digests'] = $digests;
        return $this
            ->send('GET', 'images/json', $query)
            ->toArray();
    }

}