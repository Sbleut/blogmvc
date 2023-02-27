<?php

class BDDCreationException extends Exception
{
    public function __construct($message = "There was a problem with bdd creation object")
    {
        parent::__construct($message, "0009");
    }
}
