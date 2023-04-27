<?php

/**
 * 
 *Exception thrown when there's an issue with creating an object in the database.
 */
class BDDCreationException extends Exception
{
    /**
     *
     * Constructs a new BDDCreationException with the given message and error code.
     * @param string $message The message to display for this exception. Defaults to "There was a problem with bdd creation object".
     * @param string $code The error code for this exception. Defaults to "0009".
     */
    public function __construct($message = "There was a problem with bdd creation object", $code = "0009")
    {
        parent::__construct($message, $code);
    }
}
