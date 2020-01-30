<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

class Volumes extends Common
{
    public function list(
        array $filters = []
    ): array
    {
        $query = [];
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        return $this
            ->send('GET', 'volumes', $query)
            ->toJson();
    }

}