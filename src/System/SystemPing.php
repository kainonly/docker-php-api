<?php
declare(strict_types=1);

namespace Docker\Api\System;

use Docker\Api\Common\Manager;

class SystemPing extends Manager
{
    public function result(): string
    {
        return $this
            ->send('GET', '_ping')
            ->toString();
    }
}