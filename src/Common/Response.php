<?php
declare(strict_types=1);

namespace Docker\Api\Common;

use Psr\Http\Message\ResponseInterface;

class Response
{
    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function toString(): string
    {
        return $this->response->getBody()->getContents();
    }

    public function toArray(): array
    {
        return json_decode($this->response->getBody()->getContents(), true);
    }

    public function isOk(): string
    {
        return 'ok';
    }
}