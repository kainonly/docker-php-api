<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesCreate extends Manager
{
    protected array $headers = [
        'X-Registry-Auth' => null
    ];
    protected array $query = [
        'fromImage' => null,
        'fromSrc' => null,
        'repo' => null,
        'tag' => null,
        'platform' => ''
    ];

    public function setFormImage(string $value): self
    {
        $this->query['fromImage'] = $value;
        return $this;
    }

    public function setFromSrc(string $value): self
    {
        $this->query['fromSrc'] = $value;
        return $this;
    }

    public function SetRepo(string $value): self
    {
        $this->query['repo'] = $value;
        return $this;
    }

    public function SetTag(string $value): self
    {
        $this->query['tag'] = $value;
        return $this;
    }

    public function SetPlatform(string $value): self
    {
        $this->query['platform'] = $value;
        return $this;
    }

    public function setXRegistryAuth(string $value): self
    {
        $this->headers['X-Registry-Auth'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'images/create')
            ->isOk();
    }
}