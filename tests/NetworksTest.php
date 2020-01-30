<?php
declare(strict_types=1);

namespace DockerApiTest;

class NetworksTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client->networks->list();
        var_dump($result);
        $this->assertNotEmpty($result);
    }
}