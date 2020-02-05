<?php
declare(strict_types=1);

namespace Docker\Api\Images;

use Docker\Api\Common\Factory;

class ImagesFactory extends Factory
{
    public function list(): ImagesList
    {
        return new ImagesList($this->client);
    }

    public function build(): ImagesBuild
    {
        return new ImagesBuild($this->client);
    }

    public function buildPrune(): ImagesBuildPrune
    {
        return new ImagesBuildPrune($this->client);
    }

    public function create(): ImagesCreate
    {
        return new ImagesCreate($this->client);
    }

    public function inspect(string $name): ImagesInspect
    {
        return new ImagesInspect($this->client, $name);
    }

    public function history(string $name): ImagesHistory
    {
        return new ImagesHistory($this->client, $name);
    }

    public function push(string $name): ImagesPush
    {
        return new ImagesPush($this->client, $name);
    }

    public function tag(string $name): ImagesTag
    {
        return new ImagesTag($this->client, $name);
    }

    public function remove(string $name): ImagesRemove
    {
        return new ImagesRemove($this->client, $name);
    }

    public function search(): ImagesSearch
    {
        return new ImagesSearch($this->client);
    }

    public function prune(): ImagesPrune
    {
        return new ImagesPrune($this->client);
    }


}