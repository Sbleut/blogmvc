<?php

/**
 * Exception thrown when a controller is not found.
 */
class ControllerNotFoundException extends Exception
{
    /**
     * Constructor method.
     *
     * @param string $message The error message to be displayed.
     */
    public function __construct($message = "No controller has been found")
    {
        parent::__construct($message, "0005");
    }
}