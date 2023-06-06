<?php

/**

 * Exception class for invalid login that is not an email address.
 */
class NotAnEmail extends Exception
{
	/**
	 * Constructor for the exception class.
	 * @param string $message The message for the exception.
	 * @param string $code The error code for the exception.
	 */
	public function __construct($message = "Please provide an email address as a login.", $code = "0006")
	{
		parent::__construct($message, $code);
	}
}
