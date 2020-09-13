<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

/**
 * Trait RegistryConfig
 * @package DockerEngineAPI\Common
 * @property array $header
 */
trait RegistryConfig
{
    /**
     * This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.
     * @param array $value
     */
    public function setAuth(array $value): void
    {
        $registryAuth = json_encode($value);
        $this->header['X-Registry-Auth'] = base64_encode($registryAuth);
    }
}