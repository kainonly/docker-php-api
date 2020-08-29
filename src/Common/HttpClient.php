<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

use Exception;
use GuzzleHttp\Client;

class HttpClient implements HttpClientInterface
{
    /**
     * @var Client
     */
    private Client $client;
    /**
     * @var array
     */
    private array $headers = [];

    /**
     * HttpClient constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param array $uri
     * @param array $header
     * @param array $query
     * @param array $body
     * @return Response
     * @noinspection PhpDocMissingThrowsInspection
     * @inheritDoc
     */
    public function request(
        string $method,
        array $uri,
        array $header = [],
        array $query = [],
        array $body = []
    ): Response
    {
        try {
            $uri = array_filter($uri, fn($v) => $v !== null);
            $options = [];
            $header = array_merge($this->headers, $header);
            if (!empty($header)) {
                $options['header'] = array_filter($header, fn($v) => $v !== null);
            }
            if (!empty($query)) {
                $options['query'] = array_filter($query, fn($v) => $v !== null);
            }
            if (!empty($body)) {
                $options['json'] = array_filter($body, fn($v) => $v !== null);
            }
            /** @noinspection PhpUnhandledExceptionInspection */
            return Response::make(
                $this->client->request($method, implode('/', $uri), $options)
            );
        } catch (Exception $exception) {
            return Response::bad($exception->getMessage());
        }
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }
}