<?php
declare(strict_types=1);

namespace DockerAPITest;

use Exception;

class MainTest extends BaseTest
{
    public function testInfo(): void
    {
        try {
            $response = $this->client->info();
            self::assertFalse($response->isError());
            self::assertNotEmpty($response->getData());
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }

    public function testAuth(): void
    {
        try {
            $this->client->auth(
                getenv('username'),
                getenv('password'),
                getenv('email'),
                getenv('serveraddress')
            );
            self::assertNull(null);
        } catch (Exception $e) {
            $this->expectErrorMessage($e->getMessage());
        }
    }
}