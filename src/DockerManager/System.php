<?php
declare(strict_types=1);

namespace Docker\Api\DockerManager;

class System extends Common
{
    /**
     * Check auth configuration
     * @param string $username
     * @param string $password
     * @param string $serveraddress
     * @param string|null $email
     * @return array
     */
    public function auth(
        string $username,
        string $password,
        ?string $email,
        string $serveraddress
    ): array
    {
        $body = [];
        $body['username'] = $username;
        $body['password'] = $password;
        if ($email !== null) {
            $body['email'] = $email;
        }
        $body['serveraddress'] = $serveraddress;
        return $this
            ->send('POST', 'auth', null, $body)
            ->toJson();
    }

    /**
     * Get system information
     * @return array
     */
    public function info(): array
    {
        return $this
            ->send('GET', 'info')
            ->toJson();
    }

    /**
     * Get version
     * @return array
     */
    public function version(): array
    {
        return $this->send('GET', 'version')
            ->toJson();
    }

    /**
     * Ping
     * @return string
     */
    public function ping(): string
    {
        return $this
            ->send('GET', '_ping')
            ->toString();
    }

    /**
     * Monitor events
     * @param string|null $since
     * @param string|null $until
     * @param array $filters
     * @return array
     */
    public function event(
        string $since = null,
        string $until = null,
        array $filters = []
    ): array
    {
        $query = [];
        if ($since !== null) {
            $query['since'] = $since;
        }
        if ($until !== null) {
            $query['until'] = $until;
        }
        if (!empty($filters)) {
            $query['filters'] = $this->strings($filters);
        }
        return $this
            ->send('GET', 'events', $query)
            ->toJson();
    }

    /**
     * Get data usage information
     * @return array
     */
    public function df(): array
    {
        return $this
            ->send('GET', 'system/df')
            ->toJson();
    }
}