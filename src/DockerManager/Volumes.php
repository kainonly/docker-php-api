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
            ->toArray();
    }

    public function create(
        string $name,
        array $options = []
    ): array
    {
        $body = array_merge([
            'Driver' => 'local'
        ], $options);
        $body['Name'] = $name;
        return $this
            ->send('POST', 'volumes/create', null, $body)
            ->toArray();
    }

}