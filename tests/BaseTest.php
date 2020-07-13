<?php
declare(strict_types=1);

namespace DockerAPITest;

use DockerEngineAPI\DockerClient;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    /**
     * @var string
     */
    protected string $uri;
    /**
     * @var DockerClient
     */
    protected DockerClient $client;

    /**
     * setUp
     */
    public function setUp(): void
    {
        $this->client = DockerClient::create(
            getenv('uri') ?: '127.0.0.1:2375'
        );
    }
}