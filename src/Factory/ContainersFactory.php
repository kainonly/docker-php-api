<?php
declare(strict_types=1);

namespace DockerEngineAPI\Factory;

use DockerEngineAPI\Common\ContainersAttachOption;
use DockerEngineAPI\Common\ContainersAttachWsOption;
use DockerEngineAPI\Common\ContainersCreateOption;
use DockerEngineAPI\Common\ContainersLogsOption;
use DockerEngineAPI\Common\ContainersUpdateOption;
use DockerEngineAPI\Common\Response;

class ContainersFactory extends Factory
{
    /**
     * Returns a list of containers
     * @param int $limit Return this number of most recently created containers, including non-running ones.
     * @param bool $all Return all containers
     * @param bool $size Return the size of container as fields SizeRw and SizeRootFs.
     * @param array|null $filters Filters to process on the container list, encoded as JSON (a map[string][]string).
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
     * @param ContainersLogsOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerLogs
     */
    public function logs(string $id, ContainersLogsOption $option): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'logs'],
            $option->getQuery()
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

    /**
     * Change various configuration options of a container without having to recreate it.
     * @param string $id ID or name of the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerUpdate
     */
    public function update(string $id, ContainersUpdateOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'update'],
            $option->getBody()
        );
    }

    /**
     * Rename a container
     * @param string $id ID or name of the container
     * @param string $name New name for the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerRename
     */
    public function rename(string $id, string $name): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'rename'],
            [
                'name' => $name
            ],
        );
    }

    /**
     * Use the cgroups freezer to suspend all processes in a container.
     * @param string $id ID or name of the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerPause
     */
    public function pause(string $id): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'pause'],
        );
    }

    /**
     * Resume a container which has been paused.
     * @param string $id ID or name of the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerUnpause
     */
    public function unpause(string $id): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'unpause'],
        );
    }

    /**
     * Attach to a container to read its output or send it input.
     * You can attach to the same container multiple times and you can reattach to containers that have been detached.
     * @param string $id ID or name of the container
     * @param ContainersAttachOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerAttach
     */
    public function attach(string $id, ContainersAttachOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'attach'],
            $option->getQuery()
        );
    }

    /**
     * Attach to a container via a websocket
     * @param string $id
     * @param ContainersAttachWsOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerAttachWebsocket
     */
    public function attachWs(string $id, ContainersAttachWsOption $option): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'attach', 'ws'],
            $option->getQuery()
        );
    }

    /**
     * Block until a container stops, then returns the exit code.
     * @param string $id ID or name of the container
     * @param string $condition Wait until a container state reaches the given condition, either 'not-running' (default), 'next-exit', or 'removed'.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerWait
     */
    public function wait(string $id, string $condition = 'not-running'): Response
    {
        return $this->client->request(
            'POST',
            ['containers', $id, 'wait'],
            [
                'condition' => $condition
            ]
        );
    }

    /**
     * Remove a container
     * @param string $id ID or name of the container
     * @param bool $v Remove the volumes associated with the container
     * @param bool $force If the container is running, kill it before removing it
     * @param bool $link Remove the specified link associated with the container
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerDelete
     */
    public function remove(
        string $id,
        bool $v = false,
        bool $force = false,
        bool $link = false
    ): Response
    {
        return $this->client->request(
            'DELETE',
            ['containers', $id],
            [
                'v' => $v,
                'force' => $force,
                'link' => $link
            ]
        );
    }

    /**
     * A response header X-Docker-Container-Path-Stat is return containing a base64 - encoded JSON object with some filesystem header information about the path
     * @param string $id ID or name of the container
     * @param string $path Resource in the container’s filesystem to archive.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerArchiveInfo
     */
    public function archiveInfo(string $id, string $path): Response
    {
        return $this->client->request(
            'HEAD',
            ['containers', $id, 'archive'],
            [
                'path' => $path,
            ]
        );
    }

    /**
     * Get a tar archive of a resource in the filesystem of container id.
     * @param string $id ID or name of the container
     * @param string $path Resource in the container’s filesystem to archive.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerArchive
     */
    public function archive(string $id, string $path): Response
    {
        return $this->client->request(
            'GET',
            ['containers', $id, 'archive'],
            [
                'path' => $path,
            ]
        );
    }

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
     * @param string $id ID or name of the container
     * @param string $path Path to a directory in the container to extract the archive’s contents into.
     * @param string $noOverwriteDirNonDir If “1”, “true”, or “True” then it will be an error if unpacking the given content would cause an existing directory to be replaced with a non-directory and vice versa.
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/PutContainerArchive
     */
    public function archiveUpload(string $id, string $path, string $noOverwriteDirNonDir): Response
    {
        return $this->client->request(
            'PUT',
            ['containers', $id, 'archive'],
            [
                'path' => $path,
                'noOverwriteDirNonDir' => $noOverwriteDirNonDir
            ]
        );
    }

    /**
     * Delete stopped containers
     * @param array $filters Filters to process on the prune list, encoded as JSON (a map[string][]string).
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ContainerPrune
     */
    public function prune(array $filters): Response
    {
        return $this->client->request(
            'PUT',
            ['containers', 'prune'],
            [
                'filters' => json_encode($filters),
            ]
        );
    }
}