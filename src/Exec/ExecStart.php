<?php
declare(strict_types=1);

namespace Docker\Api\Exec;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ExecStart extends Manager
{
    private string $id;
    protected array $body = [
        'Detach' => null,
        'Tty' => null,
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function setDetach(bool $value): self
    {
        $this->body['Detach'] = $value;
        return $this;
    }

    public function setTty(bool $value): self
    {
        $this->body['Tty'] = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'exec/' . $this->id . '/start')
            ->isOk();
    }
}