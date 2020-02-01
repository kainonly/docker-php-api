<?php
declare(strict_types=1);

namespace DockerApiTest;

class SystemTest extends BaseTest
{
    public function testAuth()
    {
        $result = $this->client
            ->system
            ->auth(getenv('username'), getenv('password'))
            ->result();
        $this->assertNotNull($result);
        $this->assertEquals($result['Status'], 'Login Succeeded');
    }

    public function testInfo()
    {
        $result = $this->client
            ->system
            ->info()
            ->result();
        $this->assertNotNull($result);
        $this->assertNotEmpty($result['ID']);
    }

    public function testVersion()
    {
        $result = $this->client
            ->system
            ->version()
            ->result();
        $this->assertNotNull($result);
    }

    public function testPing()
    {
        $result = $this->client
            ->system
            ->ping()
            ->result();
        $this->assertNotNull($result);
        $this->assertEquals($result, 'OK');
    }

    public function testEvents()
    {
        $result = $this->client
            ->system
            ->events()
            ->result();
        $this->assertNotNull($result);
    }

    public function testDf()
    {
        $result = $this->client
            ->system
            ->df()
            ->result();
        $this->assertNotNull($result);
    }
}