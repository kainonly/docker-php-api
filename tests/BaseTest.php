<?php
declare(strict_types=1);

namespace DockerApiTest;

use Docker\Api\DockerClient;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected DockerClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new DockerClient(new Client([
            'base_uri' => '127.0.0.1:2375',
            'timeout' => 2.0,
        ]));
    }
}
