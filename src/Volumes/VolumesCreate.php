<?php
declare(strict_types=1);

namespace Docker\Api\Volumes;

use Docker\Api\Common\Manager;

class VolumesCreate extends Manager
{
    protected array $body = [
        'name' => null,
        'Driver' => 'local',
        'DriverOpts' => null,
        'Labels' => null
    ];

    public function setName(string $value): self
    {
        $this->body['name'] = $value;
        return $this;
    }

    public function setDriver(string $value): self
    {
        $this->body['Driver'] = $value;
        return $this;
    }

    public function setDriverOpts(array $value): self
    {
        $this->body['DriverOpts'] = $value;
        return $this;
    }

    public function setLabels(array $value): self
    {
        $this->body['Labels'] = $value;
        return $this;
    }

    public function result(): array
    {
        return $this
            ->send('POST', 'volumes/create')
            ->toArray();
    }
}