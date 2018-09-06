<?php

namespace VestaApi;

/**
 * Class Credentials
 * @package VestaApi
 */
class Credentials
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $port;

    /**
     * @var string
     */
    private $hash;

    /**
     * Credentials constructor.
     *
     * @param string $host
     * @param string $port
     * @param string $hash
     */
    public function __construct(string $host, string $port, string $hash)
    {
        $this->host = $host;
        $this->port = $port;
        $this->hash = $hash;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }
}