<?php
declare(strict_types=1);

namespace DockerApiTest;

class ImagesTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client->images->list();
        $this->assertNotEmpty($result);
    }
}