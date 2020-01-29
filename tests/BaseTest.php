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
        $this->client = DockerClient::create('127.0.0.1:2375');
    }

    public function testInfo()
    {
        $result = $this->client->system->info();
        $this->assertNotEmpty($result);
        $this->assertNotEmpty($result['ID']);
    }

    public function testVersion()
    {
        $result = $this->client->system->version();
        $this->assertNotEmpty($result);
    }

    public function testPing()
    {
        $result = $this->client->system->ping();
        $this->assertNotEmpty($result);
        $this->assertEquals($result, 'OK');
    }

    public function testDf()
    {
        $result = $this->client->system->df();
        $this->assertNotEmpty($result);
    }
}
