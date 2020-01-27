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
}