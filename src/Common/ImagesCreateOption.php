<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

class ImagesCreateOption extends CommonOption
{
    use RegistryAuth;

    protected array $header = [];
    protected array $query = [
        'platform' => ''
    ];

    /**
     * Name of the image to pull
     * @param string $value
     */
    public function setFromImage(string $value): void
    {
        $this->query['fromImage'] = $value;
    }

    /**
     * Source to import
     * @param string $value
     */
    public function setFromSrc(string $value): void
    {
        $this->query['fromSrc'] = $value;
    }

    /**
     * Repository name given to an image when it is imported
     * @param string $value
     */
    public function setRepo(string $value): void
    {
        $this->query['repo'] = $value;
    }

    /**
     * Tag or digest
     * @param string $value
     */
    public function setTag(string $value): void
    {
        $this->query['tag'] = $value;
    }

    /**
     * Platform in the format os[/arch[/variant]]
     * @param string $value
     */
    public function setPlatform(string $value): void
    {
        $this->query['platform'] = $value;
    }
}