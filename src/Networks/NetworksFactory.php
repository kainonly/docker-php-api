<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

use Docker\Api\DockerManager;
use Docker\Api\Networks\CreateParameter;

class NetworksFactory extends DockerManager
{
    public function list(array $filters = []): array
    {
        $query = [];
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        return $this
            ->send('GET', 'networks', $query)
            ->toArray();
    }

    public function inspect(string $id, bool $verbose = false): array
    {
        $query = [];
        $query['verbose'] = $verbose;
        $query['scope'] = 'local';
        return $this
            ->send('GET', 'networks/' . $id, $query)
            ->toArray();
    }

    public function remove(string $id): array
    {
        return $this
            ->send('DELETE', 'networks/' . $id)
            ->toArray();
    }

    public function create(CreateParameter $parameter): array
    {


    }
}