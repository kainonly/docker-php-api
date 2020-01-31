<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

use Docker\Api\DockerManager;

class ContainersFactory extends DockerManager
{
    public function list(
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
            ->toArray();
    }

    public function create(
        string $name,
        string $image,
        array $ports = [],
        array $volumes = [],
        array $env = [],
        array $cmd = [],
        array $options = []
    ): array
    {
        $query = [];
        $query['name'] = $name;
        $body = array_merge([
            'AttachStdin' => false,
            'AttachStdout' => true,
            'AttachStderr' => true,
            'Tty' => false,
            'OpenStdin' => false,
            'StdinOnce' => false,
            'StopSignal' => 'SIGTERM',
            'StopTimeout' => 10
        ], $options);
        $body['Image'] = $image;
        if (!empty($ports)) {
            $body['ExposedPorts'] = $ports;
        }
        if (!empty($volumes)) {
            $body[' Volumes'] = $volumes;
        }
        if (!empty($env)) {
            $body['Env'] = $env;
        }
        if (!empty($cmd)) {
            $body['Cmd'] = $cmd;
        }
        return $this
            ->send('POST', 'containers/create', $query, $body)
            ->toArray();
    }

}