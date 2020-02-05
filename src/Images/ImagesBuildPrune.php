<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesBuildPrune extends Manager
{
    public function result(): array
    {
        return $this
            ->send('POST', 'build/prune')
            ->toArray();
    }
}