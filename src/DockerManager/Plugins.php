<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

class Plugins extends Common
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
            ->send('GET', 'plugins', $query)
            ->toJson();
    }
}