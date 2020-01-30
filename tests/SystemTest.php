<?php
declare(strict_types=1);

namespace DockerApiTest;

class SystemTest extends BaseTest
{
    public function testInfo()
    {
        $result = $this->client->system->info();
        $this->assertNotNull($result);
    }

    public function testVersion()
    {
        $result = $this->client->system->version();
        $this->assertNotNull($result);
    }

    public function testPing()
    {
        $result = $this->client->system->ping();
        $this->assertNotNull($result);
        $this->assertEquals($result, 'OK');
    }

    public function testDf()
    {
        $result = $this->client->system->df();
        $this->assertNotNull($result);
    }
}