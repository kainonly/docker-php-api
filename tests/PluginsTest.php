<?php
declare(strict_types=1);

namespace DockerApiTest;

class PluginsTest extends BaseTest
{
    public function testList()
    {
        $result = $this->client->plugins->list();
        $this->assertNotNull($result);
    }
}