<?php
declare(strict_types=1);

namespace Docker\Api\System;

use Docker\Api\Common\Manager;

class SystemInfo extends Manager
{
    public function result(): array
    {
        return $this
            ->send('GET', 'info')
            ->toArray();
    }
}