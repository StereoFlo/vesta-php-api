<?php

namespace VestaApi\Commands;

/**
 * Class AbstractCommand
 * @package VestaApi\Commands
 */
abstract class AbstractCommand implements CommandInterface
{
    /**
     * possible values: yes|null
     *
     * @var string|null
     */
    protected $returnCode;

    /**
     * possible values: json|null
     *
     * @var string|null
     */
    protected $format;

    /**
     * @var string
     */
    protected $command = '';

    /**
     * @return null|string
     */
    public function getReturnCode(): ?string
    {
        return $this->returnCode;
    }

    /**
     * @return null|string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function toArray(array $params = []): array
    {
        $data['cmd'] = static::getCommand();
        if (static::getReturnCode()) {
            $data['returncode'] = static::getReturnCode();
        }
        foreach ($params as $key => $param) {
            $data = array_merge($data, ['arg' . ($key + 1) => $param]);
        }
        return $data;
    }
}