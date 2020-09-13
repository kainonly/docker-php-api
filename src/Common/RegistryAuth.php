<?php
declare(strict_types=1);

namespace DockerEngineAPI\Common;

/**
 * Trait Authentication
 * @package DockerEngineAPI\Common
 * @property array $header
 */
trait RegistryAuth
{
    /**
     * Authentication for registries is handled client side
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $serveraddress
     */
    public function setAuth(
        string $username,
        string $password,
        string $email,
        string $serveraddress
    ): void
    {
        $registryAuth = json_encode([
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'serveraddress' => $serveraddress
        ]);
        $this->header['X-Registry-Auth'] = base64_encode($registryAuth);
    }
}