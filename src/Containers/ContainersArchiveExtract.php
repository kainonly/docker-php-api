<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersArchiveExtract extends Manager
{
    private string $id;
    protected array $query = [
        'path' => null,
        'noOverwriteDirNonDir' => null,
        'copyUIDGID' => null
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setPath(string $value): self
    {
        $this->query['path'] = $value;
        return $this;
    }

    public function setNoOverwriteDirNonDir(string $value): self
    {
        $this->query['noOverwriteDirNonDir'] = $value;
        return $this;
    }

    public function setCopyUIDGID(string $value): self
    {
        $this->query['copyUIDGID'] = $value;
        return $this;
    }

    public function setBody(string $value): self
    {
        $this->content = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('PUT', 'containers/' . $this->id . '/archive')
            ->isOk();
    }
}