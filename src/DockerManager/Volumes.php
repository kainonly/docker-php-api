<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

class Volumes extends Common
{
    public function list(array $filters = []): array
    {
        $query = [];
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        return $this
            ->send('GET', 'volumes', $query)
            ->toArray();
    }

    public function create(string $name, string $driver = 'local', array $options = []): array
    {
        $body = [];
        $body['Name'] = $name;
        $body['Driver'] = $driver;
        $body = array_merge($body, $options);
        return $this
            ->send('POST', 'volumes/create', null, $body)
            ->toArray();
    }

    public function inspect(string $name): array
    {
        return $this
            ->send('GET', 'volumes/' . $name)
            ->toArray();
    }

    public function remove(string $name, bool $force = false): array
    {
        $query = [];
        $query['force'] = $force;
        return $this
            ->send('DELETE', 'volumes/' . $name, $query)
            ->toArray();
    }

    public function prune(array $filters = []): array
    {
        $query = [];
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        return $this
            ->send('POST', 'volumes/prune', $query)
            ->toArray();
    }
}