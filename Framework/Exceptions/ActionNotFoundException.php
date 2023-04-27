<?php

/**

 * Custom exception class thrown when a requested action is not found
 * @package CustomException
 */
class ActionNotFoundException extends Exception
{
	/**
	 * Constructor method for the exception
	 * @param string $message The exception message
	 */
	public function __construct($message = "No action has been found", $code = "0006")
	{
		parent::__construct($message, $code);
	}
}