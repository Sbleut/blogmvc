
<?php

/**
 * Exception thrown when a controller is not found.
 */
class MissingDataToRegisterException extends Exception
{
    /**
     * Constructor method.
     *
     * @param string $message The error message to be displayed.
     */
    public function __construct($message = "Lack of email, name or password")
    {
        parent::__construct($message, "0004");
    }
}