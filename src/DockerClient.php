<?php
declare(strict_types=1);

namespace Docker\Api;

use GuzzleHttp\Client;
use RuntimeException;

class DockerClient
{
    private Client $client;

    public function __construct(string $uri)
    {
        $this->client = new Client([
            'base_uri' => $uri,
            'timeout' => 2.0,
        ]);
    }

    /**
     * Check auth configuration
     * @param string $username
     * @param string $password
     * @param string $serveraddress
     * @param string|null $email
     * @return array
     */
    public function auth(
        string $username,
        string $password,
        ?string $email,
        string $serveraddress
    ): array
    {
        $response = $this->client->post('auth', [
            'json' => [
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'serveraddress' => $serveraddress
            ]
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }

    /**
     * Get system information
     * @return array
     */
    public function info(): array
    {
        $response = $this->client->get('info');
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }

    /**
     * Get version
     * @return array
     */
    public function version(): array
    {
        $response = $this->client->get('version');
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }

    /**
     * Ping
     * @return string
     */
    public function ping(): string
    {
        $response = $this->client->get('_ping');
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        return $response->getBody()->getContents();
    }

    /**
     * Monitor events
     * @return mixed
     */
    public function event(string $since, string $until, string $filters): array
    {
        $response = $this->client->get('events', [
            'query' => [
                'since' => $since,
                'until' => $until,
                'filters' => $filters
            ]
        ]);
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }

    /**
     * Get data usage information
     * @return mixed
     */
    public function df()
    {
        $response = $this->client->get('system/df');
        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException('Something went wrong.');
        }
        $body = $response->getBody()->getContents();
        return json_decode($body, true);
    }
}