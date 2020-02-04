<?php
declare(strict_types=1);

namespace Docker\Api\Plugins;

use Docker\Api\Common\Manager;

class PluginsPrivileges extends Manager
{
    protected array $query = [
        'remote' => null
    ];

    public function setRemote(string $value): self
    {
        $this->query['remote'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('GET', 'plugins/privileges')
            ->toArray();
    }
}