<?php
declare(strict_types=1);

namespace DockerEngineAPI\Factory;

use DockerEngineAPI\Common\ImagesBuildOption;
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

}