<?php
declare(strict_types=1);

namespace DockerEngineAPI\Factory;

use DockerEngineAPI\Common\HttpClientInterface;

abstract class CommonFactory
{
    /**
     * @var HttpClientInterface
     */
    protected HttpClientInterface $client;

    /**
     * Factory constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
}