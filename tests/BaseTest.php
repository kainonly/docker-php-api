<?php
declare(strict_types=1);

namespace DockerApiTest;

use Docker\Api\DockerClient;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    private DockerClient $client;

    protected function setUp(): void
    {
        parent::setUp();
        $this->client = new DockerClient('dell:2375');
    }

    public function testInfo()
    {
        $result = $this->client->info();
        $this->assertNotEmpty($result);
        $this->assertNotEmpty($result['ID']);
    }

    public function testVersion()
    {
        $result = $this->client->version();
        $this->assertNotEmpty($result);
    }
}
