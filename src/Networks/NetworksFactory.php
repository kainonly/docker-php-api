<?php
declare(strict_types=1);

namespace Docker\Api\Networks;

use Docker\Api\Common\Factory;

class NetworksFactory extends Factory
{
//    public function list(array $filters = []): array
//    {
//        $query = [];
//        if (!empty($filters)) {
//            $query['filters'] = $this->strings($filters);
//        }
//        return $this
//            ->send('GET', 'networks', $query)
//            ->toArray();
//    }
//
//    public function inspect(string $id, bool $verbose = false): array
//    {
//        $query = [];
//        $query['verbose'] = $verbose;
//        $query['scope'] = 'local';
//        return $this
//            ->send('GET', 'networks/' . $id, $query)
//            ->toArray();
//    }
//
//    public function remove(string $id): array
//    {
//        return $this
//            ->send('DELETE', 'networks/' . $id)
//            ->toArray();
//    }
//
//    public function create(CreateParameter $parameter): array
//    {
//    }
}