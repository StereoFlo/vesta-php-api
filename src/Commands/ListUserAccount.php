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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cmd'  => $this->command,
            'arg1' => $this->username,
            'arg2' => $this->format,
        ];
    }
}