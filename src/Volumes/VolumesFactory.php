<?php
declare(strict_types=1);

namespace Docker\Api\Volumes;

use Docker\Api\Common\Factory;

class VolumesFactory extends Factory
{
    public function list(): VolumesList
    {
        return new VolumesList($this->client);
    }

    public function create(): VolumesCreate
    {
        return new VolumesCreate($this->client);
    }

    public function inspect(string $name): VolumesInspect
    {
        return new VolumesInspect($this->client, $name);
    }

    public function remove(string $name): VolumesRemove
    {
        return new VolumesRemove($this->client, $name);
    }

    public function prune(): VolumesPrune
    {
        return new VolumesPrune($this->client);
    }
}