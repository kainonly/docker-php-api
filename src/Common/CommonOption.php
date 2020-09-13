<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

abstract class CommonOption
{
    protected array $header = [];
    protected array $query = [];
    protected array $body = [];

    /**
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }
}