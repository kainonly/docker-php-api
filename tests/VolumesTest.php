<?php
declare(strict_types=1);

namespace DockerApiTest;

class VolumesTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client
            ->volumes
            ->list
            ->result();
        $this->assertNotNull($result);
    }

    public function testCreate()
    {
        $result = $this->client
            ->volumes
            ->create
            ->setName('test')
            ->result();
        $this->assertNotNull($result);
    }
}