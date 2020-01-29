<?php
declare(strict_types=1);

namespace DockerApiTest;

class ContainersTest extends BaseTest
{
    public function testCreate()
    {
        $result = $this->client->containers->create('alp', 'alpine');
        var_dump($result);
        $this->assertNotEmpty($result);
    }

    public function testLists()
    {
        $result = $this->client->containers->lists();
        var_dump($result);
        $this->assertNotEmpty($result);
    }
}