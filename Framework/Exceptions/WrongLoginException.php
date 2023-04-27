<?php

/**

 *Exception thrown when a login attempt fails because no account has been found
 **/
class WrongLoginException extends Exception
{
	/**
	 *Constructs a new WrongLoginException with a default message
	 *@param string $message
	 */
	public function __construct($message = "No account has been found")
	{
		parent::__construct($message, "0006");
	}
}
