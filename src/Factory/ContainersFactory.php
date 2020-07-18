<?php
declare(strict_types=1);

namespace DockerEngineAPI\Factory;

use DockerEngineAPI\Common\ContainersCreateOption;
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
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerList
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

    /**
     * Create a container
     * @param string $name Assign the specified name to the container. Must match /?[a-zA-Z0-9_-]+
     * @param ContainersCreateOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerCreate
     */
    public function create(string $name, ContainersCreateOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['containers', 'create'],
            [
                'name' => $name
            ],
            $option->getBody()
        );
    }

    /**
     * Return low-level information about a container.
     * @param string $id ID or name of the container
     * @param bool $size Return the size of container as fields SizeRw and SizeRootFs
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerInspect
     */
    public function inspect(string $id, bool $size = false): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'json'],
            [
                'size' => $size
            ]
        );
    }

    /**
     * On Unix systems, this is done by running the ps command.
     * This endpoint is not supported on Windows.
     * @param string $id ID or name of the container
     * @param string $ps_args The arguments to pass to ps. For example, aux
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerTop
     */
    public function top(string $id, string $ps_args): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'top'],
            [
                'ps_args' => $ps_args
            ]
        );
    }

    /**
     * Get stdout and stderr logs from a container.
     * @param string $id ID or name of the container
     * @param bool $follow Return the logs as a stream.
     * @param bool $stdout Return logs from stdout
     * @param bool $stderr Return logs from stderr
     * @param int $since Only return logs since this time, as a UNIX timestamp
     * @param int $until Only return logs before this time, as a UNIX timestamp
     * @param bool $timestamps Add timestamps to every log line
     * @param string $tail Only return this number of log lines from the end of the logs. Specify as an integer or all to output all log lines.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerLogs
     */
    public function logs(
        string $id,
        bool $follow = false,
        bool $stdout = false,
        bool $stderr = false,
        int $since = 0,
        int $until = 0,
        bool $timestamps = false,
        string $tail = 'all'
    ): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'logs'],
            [
                'follow' => $follow,
                'stdout' => $stdout,
                'stderr' => $stderr,
                'since' => $since,
                'until' => $until,
                'timestamps' => $timestamps,
                'tail' => $tail
            ]
        );
    }

    /**
     * Get changes on a container’s filesystem
     * @param string $id ID or name of the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerChanges
     */
    public function changes(string $id): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'changes'],
        );
    }

    /**
     * Export the contents of a container as a tarball.
     * @param string $id ID or name of the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerChanges
     */
    public function export(string $id): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'export']
        );
    }

    /**
     * Get container stats based on resource usage
     * @param string $id ID or name of the container
     * @param bool $stream Stream the output. If false, the stats will be output once and then it will disconnect.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerStats
     */
    public function stats(string $id, bool $stream): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'stats'],
            [
                'stream' => $stream
            ]
        );
    }

    /**
     * Resize the TTY for a container. You must restart the container for the resize to take effect.
     * @param string $id ID or name of the container
     * @param int $h Height of the tty session in characters
     * @param int $w Width of the tty session in characters
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerResize
     */
    public function resize(string $id, int $h, int $w): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'resize'],
            [
                'h' => $h,
                'w' => $w
            ]
        );
    }

    /**
     * Start a container
     * @param string $id ID or name of the container
     * @param string $detachKeys Override the key sequence for detaching a container.
     * Format is a single character [a-Z] or ctrl-<value> where <value> is one of: a-z, @, ^, [, , or _.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerStart
     */
    public function start(string $id, string $detachKeys): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'start'],
            [
                'detachKeys' => $detachKeys
            ]
        );
    }

    /**
     * Stop a container
     * @param string $id ID or name of the container
     * @param int $t Number of seconds to wait before killing the containe
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerStop
     */
    public function stop(string $id, int $t): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'stop'],
            [
                't' => $t
            ]
        );
    }

    /**
     * Restart a container
     * @param string $id ID or name of the container
     * @param int $t Number of seconds to wait before killing the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerRestart
     */
    public function restart(string $id, int $t): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'restart'],
            [
                't' => $t
            ]
        );
    }

    /**
     * Send a POSIX signal to a container, defaulting to killing to the container.
     * @param string $id ID or name of the container
     * @param string $signal Signal to send to the container as an integer or string (e.g. SIGINT)
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerKill
     */
    public function kill(string $id, string $signal = 'SIGKILL'): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'kill'],
            [
                'signal' => $signal
            ]
        );
    }
}