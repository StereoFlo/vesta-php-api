<?php

namespace VestaApi\Commands;

/**
 * Class AddDatabase
 * @package VestaApi\Commands
 */
class AddDatabase extends AbstractCommand
{
    /**
     * @var string
     */
    protected $command = 'v-add-database';

    /**
     * @var string
     */
    protected $returnCode = 'yes';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $dbUser;

    /**
     * @var string
     */
    private $dbPassword;

    /**
     * AddDatabase constructor.
     *
     * @param string $username
     * @param string $dbName
     * @param string $dbUser
     * @param string $dbPassword
     */
    public function __construct(string $username, string $dbName, string $dbUser, string $dbPassword)
    {
        $this->username   = $username;
        $this->dbName     = $dbName;
        $this->dbUser     = $dbUser;
        $this->dbPassword = $dbPassword;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'cmd'        => $this->command,
            'returncode' => $this->returnCode,
            'arg1'       => $this->username,
            'arg2'       => $this->dbName,
            'arg3'       => $this->dbUser,
            'arg4'       => $this->dbPassword,
        ];
    }
}