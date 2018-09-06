<?php

namespace VestaApi\Commands;

/**
 * Class ListUserAccount
 * @package VestaApi\Commands
 */
class ListUserAccount extends AbstractCommand
{
    /**
     * @var string
     */
    protected $command = 'v-list-user';

    /**
     * @var string
     */
    protected $format = 'json';

    /**
     * @var string
     */
    private $username;

    /**
     * ListUserAccount constructor.
     *
     * @param string $username
     */
    public function __construct(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function toArray(array $params = []): array
    {
        return parent::toArray([
            $this->username,
            $this->format,
        ]);
    }
}