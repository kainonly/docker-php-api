<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

class Containers extends Common
{
    public function lists(
        bool $all = false,
        int $limit = null,
        bool $size = false,
        array $filters = []
    ): array
    {
        $query = [];
        $query['all'] = $all;
        if (!empty($limit)) {
            $query['limit'] = $limit;
        }
        $query['size'] = $size;
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        return $this
            ->send('GET', 'containers/json', $query)
            ->toJson();
    }

    public function create(string $name, array $options): array
    {
        $query = [];
        $requestQuery['name'] = $name;
        $body = [];
        return $this
            ->send('POST', 'containers/create', $query, $body)
            ->toJson();
    }

}