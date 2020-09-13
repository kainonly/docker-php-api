<?php
declare(strict_types=1);

namespace DockerEngineAPI\Factory;

use DockerEngineAPI\Common\ImagesBuildOption;
use DockerEngineAPI\Common\ImagesCreateOption;
use DockerEngineAPI\Common\ImagesPushOption;
use DockerEngineAPI\Common\Response;

class ImagesFactory extends CommonFactory
{
    /**
     * Returns a list of images on the server.
     * Note that it uses a different, smaller representation of an image than inspecting a single image.
     * @param bool $all Show all images. Only images from a final layer (no children) are shown by default.
     * @param array $filters A JSON encoded value of the filters (a map[string][]string) to process on the images list.
     * @param bool $digests Show digest information as a RepoDigests field on each image
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageList
     */
    public function lists(
        bool $all = false,
        array $filters = [],
        bool $digests = false
    ): Response
    {
        $query = [
            'all' => $all,
            'digests' => $digests
        ];
        if (!empty($filters)) {
            $query['filters'] = json_encode($filters);
        }
        return $this->client->request(
            'GET',
            ['images', 'json'],
            [],
            $query
        );
    }

    /**
     * Build an image from a tar archive with a Dockerfile in it.
     * @param ImagesBuildOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageBuild
     */
    public function build(ImagesBuildOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['build'],
            $option->getHeader(),
            $option->getQuery()
        );
    }

    /**
     * Delete builder cache
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/BuildPrune
     */
    public function buildPrune(): Response
    {
        return $this->client->request(
            'POST',
            ['build', 'prune'],
        );
    }

    /**
     * Create an image by either pulling it from a registry or importing it.
     * @param ImagesCreateOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageCreate
     */
    public function create(ImagesCreateOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['images', 'create'],
            $option->getHeader(),
            $option->getQuery()
        );
    }

    /**
     * Return low-level information about an image.
     * @param string $name Image name or id
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageInspect
     */
    public function inspect(string $name): Response
    {
        return $this->client->request(
            'GET',
            ['images', $name, 'json']
        );
    }

    /**
     * Return parent layers of an image.
     * @param string $name Image name or ID
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageHistory
     */
    public function history(string $name): Response
    {
        return $this->client->request(
            'GET',
            ['images', $name, 'history']
        );
    }

    /**
     * Push an image to a registry.
     * @param string $name Image name or ID
     * @param ImagesPushOption $option
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImagePush
     */
    public function push(string $name, ImagesPushOption $option): Response
    {
        return $this->client->request(
            'POST',
            ['images', $name, 'push'],
            $option->getHeader(),
            $option->getQuery()
        );
    }

    /**
     * Tag an image so that it becomes part of a repository.
     * @param string $name Image name or ID to tag.
     * @param string $repo The repository to tag in
     * @param string $tag The name of the new tag
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageTag
     */
    public function tag(string $name, string $repo, string $tag): Response
    {
        return $this->client->request(
            'POST',
            ['images', $name, 'tag'],
            [],
            [
                'repo' => $repo,
                'tag' => $tag
            ]
        );
    }

    /**
     * Remove an image, along with any untagged parent images that were referenced by that image.
     * @param string $name Image name or ID
     * @param bool $force Remove the image even if it is being used by stopped containers or has other tags
     * @param bool $noprune Do not delete untagged parent images
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageDelete
     */
    public function remove(string $name, bool $force = false, bool $noprune = false): Response
    {
        return $this->client->request(
            'DELETE',
            ['images', $name],
            [],
            [
                'force' => $force,
                'noprune' => $noprune
            ]
        );
    }

    /**
     * Search for an image on Docker Hub.
     * @param string $term Term to search
     * @param int $limit Maximum number of results to return
     * @param array $filters A JSON encoded value of the filters
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImageSearch
     */
    public function search(string $term, int $limit, array $filters = []): Response
    {
        return $this->client->request(
            'GET',
            ['images', 'search'],
            [],
            [
                'term' => $term,
                'limit' => $limit,
                'filters' => json_encode($filters)
            ]
        );
    }

    /**
     * Delete unused images
     * @param array $filters Filters to process on the prune list
     * @return Response
     * @see https://docs.docker.com/engine/api/v1.37/#operation/ImagePrune
     */
    public function imagesPrune(array $filters = []): Response
    {
        return $this->client->request(
            'POST',
            ['images', 'prune'],
            [],
            [
                'filters' => json_encode($filters)
            ]
        );
    }

}