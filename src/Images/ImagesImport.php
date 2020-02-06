<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Manager;

class ImagesImport extends Manager
{
    protected array $query = [
        'quiet' => false
    ];

    public function setQuiet(bool $value): self
    {
        $this->query['quiet'] = $value;
        return $this;
    }

    public function setBody(string $value): self
    {
        $this->content = $value;
        return $this;
    }

    public function result(): string
    {
        return $this
            ->send('POST', 'images/load')
            ->isOk();
    }
}