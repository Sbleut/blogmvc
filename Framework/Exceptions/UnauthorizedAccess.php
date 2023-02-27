<?php

class UnauthorizedAccess extends Exception
{
    public function __construct($message = "You don't have access to this part of the website")
    {
        parent::__construct($message, "0010");
    }
}
