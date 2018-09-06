<?php

namespace VestaApi\Client;

/**
 * Interface ClientInterface
 * @package VestaApi\Client
 */
interface ClientInterface
{
    /**
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * @param array $data
     */
    public function setData(array $data);

    /**
     * @param string $method
     */
    public function setMethod(string $method);

    /**
     * @return string
     */
    public function send(): string ;
}