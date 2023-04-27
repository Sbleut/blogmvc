<?php

/**
 * Exception thrown when a requested view cannot be found
 */
class ViewNotFoundException extends Exception
{
    /**
     * Constructs a new ViewNotFoundException with the specified error message and error code
     *
     * @param string $message The error message to display
     * @param int $code The error code to use
     */
    public function __construct($message = "No view has been found", $code = 0)
    {
        parent::__construct($message, $code);
    }
}
