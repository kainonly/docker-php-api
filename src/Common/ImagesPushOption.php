<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ImagesPushOption extends CommonOption
{
    use RegistryAuth;

    /**
     * The tag to associate with the image on the registry.
     * @param string $value
     */
    public function setTag(string $value): void
    {
        $this->query['tag'] = $value;
    }
}