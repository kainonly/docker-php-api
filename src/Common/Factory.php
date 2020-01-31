<?php
declare(strict_types=1);

namespace Docker\Api\Common;

use GuzzleHttp\Client;

abstract class Factory
{
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->factorys();
    }

    protected function factorys()
    {

    }
}