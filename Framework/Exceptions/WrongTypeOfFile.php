<?php

/**
 *Exception thrown when a file is uploaded to the website with a format that is not accepted.
 */
class WrongTypeOfFile extends Exception
{
	/**
	 * Constructor for the WrongTypeOfFile exception.
	 * @param string $message The message to be displayed with the exception.
	 */
	public function __construct($message = "The image you tried to upload doesn't fit the website criteria. We only accept png or jpeg files")
	{
		parent::__construct($message, "00010");
	}
}
