<?php

namespace VestaApi\Commands;

/**
 * Interface CommandInterface
 * @package VestaApi\Commands
 */
interface CommandInterface
{
    /**
     * @return null|string
     */
    public function getReturnCode(): ?string ;

    /**
     * @return null|string
     */
    public function getFormat(): ?string ;

    /**
     * @return string
     */
    public function getCommand(): string;

    /**
     * @return array
     */
    public function toArray(): array ;
}