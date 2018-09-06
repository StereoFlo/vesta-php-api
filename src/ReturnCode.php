<?php

namespace VestaApi;

/**
 * Class ReturnCode
 * @package VestaApi
 */
class ReturnCode
{
    const CODES = [
        -1 => [
            'name'    => 'NO_CODE_ERR',
            'comment' => 'Unknown error',
        ],
        0  => [
            'name'    => 'OK',
            'comment' => 'Command has been successfully performed',
        ],
        1  => [
            'name'    => 'E_ARGS',
            'comment' => 'Not enough arguments provided',
        ],
        2  => [
            'name'    => 'E_INVALID',
            'comment' => 'Object or argument is not valid',
        ],
        3  => [
            'name'    => 'E_NOTEXIST',
            'comment' => 'Object doesn\'t exist',
        ],
        4  => [
            'name'    => 'E_EXISTS',
            'comment' => 'Object already exists',
        ],
        5  => [
            'name'    => 'E_SUSPENDED',
            'comment' => 'Object is suspended',
        ],
        6  => [
            'name'    => 'E_UNSUSPENDED',
            'comment' => 'Object is already unsuspended',
        ],
        7  => [
            'name'    => 'E_INUSE',
            'comment' => 'Object can\'t be deleted because is used by the other object',
        ],
        8  => [
            'name'    => 'E_LIMIT',
            'comment' => 'Object cannot be created because of hosting package limits',
        ],
        9  => [
            'name'    => 'E_PASSWORD',
            'comment' => 'Wrong password',
        ],
        10 => [
            'name'    => 'E_FORBIDEN',
            'comment' => 'Object cannot be accessed be the user',
        ],
        11 => [
            'name'    => 'E_DISABLED',
            'comment' => 'Subsystem is disabled',
        ],
        12 => [
            'name'    => 'E_PARSING',
            'comment' => 'Configuration is broken',
        ],
        13 => [
            'name'    => 'E_DISK',
            'comment' => 'Not enough disk space to complete the action',
        ],
        14 => [
            'name'    => 'E_LA',
            'comment' => 'Server is to busy to complete the action',
        ],
        15 => [
            'name'    => 'E_CONNECT',
            'comment' => 'Connection failed. Host is unreachable',
        ],
        16 => [
            'name'    => 'E_FTP',
            'comment' => 'FTP server is not responding',
        ],
        17 => [
            'name'    => 'E_DB',
            'comment' => 'Database server is not responding',
        ],
        18 => [
            'name'    => 'E_RRD',
            'comment' => 'RRDtool failed to update the database',
        ],
        19 => [
            'name'    => 'E_UPDATE',
            'comment' => 'Update operation failed',
        ],
        20 => [
            'name'    => 'E_RESTART',
            'comment' => 'Service restart failed',
        ],
    ];

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $comment;

    /**
     * ReturnCode constructor.
     *
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->init($code);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name'    => $this->name,
            'comment' => $this->comment,
        ];
    }

    /**
     * @param string $code
     *
     * @return ReturnCode
     */
    private function init(string $code): self
    {
        if (!isset(self::CODES[$code])) {
            $this->name    = self::CODES[-1]['name'];
            $this->comment = $code ?? self::CODES[-1]['comment'];
            return $this;
        }
        $this->name    = self::CODES[$code]['name'];
        $this->comment = self::CODES[$code]['comment'];
        return $this;
    }
}