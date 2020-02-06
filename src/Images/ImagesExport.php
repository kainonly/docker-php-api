<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ImagesExport extends Manager
{
    private string $name;

    public function __construct(Client $client, string $name)
    {
        parent::__construct($client);
        $this->name = $name;
    }

    public function result(): string
    {
        return $this
            ->send('GET', 'images/' . $this->name . '/get')
            ->toString();
    }
}