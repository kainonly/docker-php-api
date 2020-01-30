<?php
declare(strict_types=1);

namespace DockerApiTest;

class VolumesTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client->volumes->list();
        $this->assertNotNull($result);
    }
}