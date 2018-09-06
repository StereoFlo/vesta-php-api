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
     * @param array $params
     *
     * @return array
     */
    public function toArray(array $params = []): array
    {
        return parent::toArray([
            $this->username,
            $this->dbName,
            $this->dbUser,
            $this->dbPassword,
        ]);
    }
}