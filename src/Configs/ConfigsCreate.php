<?php
declare(strict_types=1);

namespace Docker\Api\Configs;

use Docker\Api\Common\Manager;

class ConfigsCreate extends Manager
{
    protected array $body = [
        'Name' => null,
        'Labels' => null,
        'Data' => null,
        'Templating' => null
    ];

    public function setName(string $value): self
    {
        $this->body['Name'] = $value;
        return $this;
    }

    public function setLabel(array $value): self
    {
        $this->body['Labels'] = $value;
        return $this;
    }

    public function setData(string $value): self
    {
        $this->body['Data'] = $value;
        return $this;
    }

    public function setTemplating(array $value): self
    {
        $this->body['Templating'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'configs/create')
            ->toArray();
    }
}