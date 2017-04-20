<?php

namespace Batch\Sample\Exception;

class RunDuplicatedException extends \Exception
{

    /**
     * RunDuplicatedException constructor.
     * @param string $message
     */
    public function __construct($commandName)
    {
        parent::__construct($commandName . " run duplicated\n", 0, null);
    }
}
