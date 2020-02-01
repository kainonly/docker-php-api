<?php
declare(strict_types=1);

namespace Docker\Api\System;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class SystemAuth extends Manager
{
    protected array $body = [
        'username' => null,
        'password' => null,
        'email' => null,
        'serveraddress' => null
    ];

    public function __construct(Client $client, string $username, string $password)
    {
        parent::__construct($client);
        $this->body['username'] = $username;
        $this->body['password'] = $password;
    }

    public function setEmail(string $value): self
    {
        $this->body['email'] = $value;
        return $this;
    }

    public function setServeraddress(string $value): self
    {
        $this->body['serveraddress'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'auth')
            ->toArray();
    }
}