<?php
declare(strict_types=1);

namespace DockerAPITest;

use Exception;

class ContainersTest extends BaseTest
{
    public function testLists(): void
    {
        try {
            $response = $this->client
                ->containers()
                ->lists(20);
            self::assertFalse($response->isError());
            self::assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}