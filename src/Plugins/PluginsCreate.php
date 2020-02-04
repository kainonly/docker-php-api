<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;

class PluginsCreate extends Manager
{
    protected array $query = [
        'name' => null
    ];

    public function setName(string $value): self
    {
        $this->query['name'] = $value;
        return $this;
    }

    public function setValue(string $value): self
    {
        $this->content = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'plugins/create')
            ->isOk();
    }
}