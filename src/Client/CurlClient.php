<?php

namespace VestaApi\Client;

/**
 * Class CurlClient
 * @package VestaApi\Client
 */
class CurlClient implements ClientInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $method;

    /**
     * @param string $url
     *
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string $method
     *
     * @return void
     */
    public function setMethod(string $method = 'POST'): void
    {
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function send(): string
    {
        $data = \http_build_query($this->data);
        $curl = \curl_init();
        \curl_setopt($curl, CURLOPT_URL, $this->url);
        \curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        \curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        \curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        \curl_setopt($curl, CURLOPT_POST, true);
        \curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        return \curl_exec($curl);
    }
}