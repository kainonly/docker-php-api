<?php
declare(strict_types=1);

namespace DockerApiTest;

class ContainersTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client->containers->list();
        $this->assertNotNull($result);
    }

    public function testCreate()
    {
    }
}