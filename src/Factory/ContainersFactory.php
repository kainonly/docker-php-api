<?php
declare(strict_types=1);

namespace DockerEngineAPI\Factory;

use DockerEngineAPI\Common\Response;

class ContainersFactory extends Factory
{
    /**
     * Returns a list of containers
     * @param int $limit Return this number of most recently created containers, including non-running ones.
     * @param bool $all Return all containers
     * @param bool $size Return the size of container as fields SizeRw and SizeRootFs.
     * @param array $filters Filters to process on the container list, encoded as JSON (a map[string][]string).
     * @return Response
     */
    public function lists(
        int $limit,
        bool $all = false,
        bool $size = false,
        ?array $filters = null
    ): Response
    {
        $query = [
            'all' => $all,
            'limit' => $limit,
            'size' => $size,
        ];
        if (!empty($filters)) {
            $query['filters'] = json_encode($filters);
        }
        return $this->client->request(
            'GET',
            ['containers', 'json'],
            $query
        );
    }

    public function create(string $name): Response
    {
        return $this->client->request(
            'POST',
            ['containers', 'create'],
            [
                'name' => $name
            ]
        );
    }
}