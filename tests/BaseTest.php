<?php
declare(strict_types=1);

namespace DockerApiTest;

use Docker\Api\DockerClient;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    protected DockerClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = DockerClient::create('127.0.0.1:2375');
    }
}
