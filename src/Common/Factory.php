<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

abstract class Factory
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