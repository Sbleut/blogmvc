<?php

/**
 * Exception thrown when more than 1 route is found
 */
class MultipleRouteFoundException extends Exception
{
    /**
     * Constructor
     *
     * @param string $message Exception message
     */
    public function __construct($message = "More than 1 route has been found")
    {
        parent::__construct($message, "0005");
    }
}
