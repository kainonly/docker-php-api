<?php
declare(strict_types=1);

namespace DockerApiTest;

class ContainersTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client
            ->containers
            ->list
            ->setAll(true)
            ->setSize(false)
            ->result();
        $this->assertNotNull($result);
    }
}