<?php

namespace VestaApi;

use VestaApi\Client\ClientInterface;
use VestaApi\Commands\CommandInterface;

/**
 * Class Vesta
 * @package VestaApi
 */
class Vesta
{
    const VESTA_URL = 'https://%s:%d/api/';

    /**
     * @var Credentials
     */
    private $credentials;

    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param Credentials $credentials
     *
     * @return Vesta
     */
    public function setCredentials(Credentials $credentials): Vesta
    {
        $this->credentials = $credentials;
        return $this;
    }

    /**
     * @param CommandInterface $command
     *
     * @return Vesta
     */
    public function setCommand(CommandInterface $command): Vesta
    {
        $this->command = $command;
        return $this;
    }

    /**
     * @param ClientInterface $client
     *
     * @return Vesta
     */
    public function setClient(ClientInterface $client): Vesta
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get(): array
    {
        return $this->execute();
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function execute(): array
    {
        $url = \sprintf(self::VESTA_URL, $this->credentials->getHost(), $this->credentials->getPort());
        $data = \array_merge([
            'hash' => $this->credentials->getHash()
        ], $this->command->toArray());

        $this->client->setUrl($url);
        $this->client->setData($data);

        switch (true) {
            case $this->command->getFormat():
                $response = $this->client->send();
                return \json_decode($response, true);
            case $this->command->getReturnCode():
                $response = $this->client->send();
                return (new ReturnCode($response))->toArray();
            default:
                throw new \Exception('unknown format');
        }
    }
}