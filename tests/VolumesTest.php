<?php
declare(strict_types=1);

namespace DockerApiTest;

class VolumesTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client->volumes
            ->list()
            ->result();
        $this->assertNotNull($result);
    }

    public function testCreate()
    {
        $result = $this->client
            ->volumes
            ->create()
            ->setName('test')
            ->result();
        $this->assertNotNull($result);
    }

    public function testInspect()
    {
        $result = $this->client
            ->volumes
            ->inspect('test')
            ->result();
        var_dump($result);
        $this->assertNotNull($result);
    }

    public function testRemove()
    {
        $result = $this->client
            ->volumes
            ->remove('test')
            ->result();
        $this->assertNotNull($result);
    }

    public function testPrune()
    {
        $result = $this->client
            ->volumes
            ->prune()
            ->result();
        $this->assertNotNull($result);
    }
}