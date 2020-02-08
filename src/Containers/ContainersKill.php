<?php
declare(strict_types=1);

namespace Docker\Api\Containers;

use Docker\Api\Common\Manager;
use GuzzleHttp\Client;

class ContainersKill extends Manager
{
    private string $id;
    protected array $query = [
        'signal' => 'SIGKILL'
    ];

    public function __construct(Client $client, string $id)
    {
        parent::__construct($client);
        $this->id = $id;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'containers/' . $this->id . '/kill')
            ->isOk();
    }
}