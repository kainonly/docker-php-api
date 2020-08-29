<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param array $uri
     * @param array $header
     * @param array $query
     * @param array $body
     * @return Response
     */
    public function request(
        string $method,
        array $uri,
        array $header = [],
        array $query = [],
        array $body = []
    ): Response;
}