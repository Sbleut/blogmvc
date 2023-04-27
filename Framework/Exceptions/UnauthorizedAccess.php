<?php

/**

 *Exception thrown when a user tries to access a part of the website they are not authorized to.
 */
class UnauthorizedAccess extends Exception
{
    /**
     * Constructor.
     * @param string $message The error message to display
     */
    public function __construct($message = "You don't have access to this part of the website")
    {
        parent::__construct($message, "0010");
    }
}
