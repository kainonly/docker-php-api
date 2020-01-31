<?php
declare(strict_types=1);

namespace Docker\Api\System;

use Docker\Api\Common\Factory;

class SystemFactory extends Factory
{
//    /**
//     * Check auth configuration
//     * @param string $serveraddress
//     * @param string $username
//     * @param string $password
//     * @param string|null $email
//     * @return array
//     */
//    public function auth(
//        string $serveraddress,
//        string $username,
//        string $password,
//        string $email = null
//    ): array
//    {
//        $body = [];
//        $body['serveraddress'] = $serveraddress;
//        $body['username'] = $username;
//        $body['password'] = $password;
//        if (!empty($email)) {
//            $body['email'] = $email;
//        }
//        return $this
//            ->send('POST', 'auth', null, $body)
//            ->toArray();
//    }
//
//    /**
//     * Get system information
//     * @return array
//     */
//    public function info(): array
//    {
//        return $this
//            ->send('GET', 'info')
//            ->toArray();
//    }
//
//    /**
//     * Get version
//     * @return array
//     */
//    public function version(): array
//    {
//        return $this->send('GET', 'version')
//            ->toArray();
//    }
//
//    /**
//     * Ping
//     * @return string
//     */
//    public function ping(): string
//    {
//        return $this
//            ->send('GET', '_ping')
//            ->toString();
//    }
//
//    /**
//     * Monitor events
//     * @param string|null $since
//     * @param string|null $until
//     * @param array $filters
//     * @return array
//     */
//    public function events(
//        string $since = null,
//        string $until = null,
//        array $filters = []
//    ): array
//    {
//        $query = [];
//        if ($since !== null) {
//            $query['since'] = $since;
//        }
//        if ($until !== null) {
//            $query['until'] = $until;
//        }
//        if (!empty($filters)) {
//            $query['filters'] = $this->strings($filters);
//        }
//        return $this
//            ->send('GET', 'events', $query)
//            ->toArray();
//    }
//
//    /**
//     * Get data usage information
//     * @return array
//     */
//    public function df(): array
//    {
//        return $this
//            ->send('GET', 'system/df')
//            ->toArray();
//    }
}