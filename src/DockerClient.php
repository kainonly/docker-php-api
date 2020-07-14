<?php
declare(strict_types=1);

namespace DockerEngineAPI;

use DI\Container;
use DockerEngineAPI\Common\HttpClient;
use DockerEngineAPI\Common\Response;
use GuzzleHttp\Client;
use DockerEngineAPI\Common\HttpClientInterface;
use Psr\Container\ContainerInterface;

class DockerClient
{
    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $client;

    public static function create(
        string $uri,
        ?string $user = null,
        ?string $pass = null,
        float $timeout = 5.0
    ): self
    {
        $option = [
            'base_uri' => $uri,
            'timeout' => $timeout
        ];
        if (!empty($user) && !empty($pass)) {
            $option['auth'] = [$user, $pass];
        }
        $client = new Client($option);
        return new self($client);
    }

    public function __construct(Client $client)
    {
        $this->container = new Container();
        $this->client = new HttpClient($client);
        $this->container->set(HttpClientInterface::class, $this->client);
    }

    /**
     * Versioning
     * @return Response
     */
    public function info(): Response
    {
        return $this->client->request(
            'GET',
            ['info']
        );
    }

    /**
     * Authentication for registries is handled client side
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $serveraddress
     */
    public function auth(
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
        $this->client->setHeader('X-Registry-Auth', base64_encode($registryAuth));
    }
}