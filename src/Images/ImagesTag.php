<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ImagesTag extends Manager
{
    private string $name;
    protected array $query = [
        'repo' => null,
        'tag' => null
    ];

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function setRepo(string $value): self
    {
        $this->query['repo'] = $value;
        return $this;
    }

    public function setTag(string $value): self
    {
        $this->query['tag'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'images/' . $this->name . '/tag')
            ->isOk();
    }
}