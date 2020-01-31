<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Factory;

class PluginsFactory extends Factory
{
//    public function list(
//        array $filters = []
//    ): array
//    {
//        $query = [];
//        if (!empty($filters)) {
//            $query['filters'] = $this->strings($filters);
//        }
//        return $this
//            ->send('GET', 'plugins', $query)
//            ->toArray();
//    }
}