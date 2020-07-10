<?php
declare(strict_types=1);

namespace DockerEngineAPI;

use GuzzleHttp\Client;
use Psr\Container\ContainerInterface;

class DockerClient
{
    /**
     * @var ContainerInterface
     */
    private ContainerInterface $container;

    public function __construct(Client $client)
    {

    }
}