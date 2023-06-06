<?php

/**

 * Custom exception class thrown when a requested action is not found
 * @package CustomException
 */
class NoTitleNoContent extends Exception
{
	/**
	 * Constructor method for the exception
	 * @param string $message The exception message
	 */
	public function __construct($message = "Il manque un titre ou un contenu à cetter article", $code = "0012")
	{
		parent::__construct($message, $code);
	}
}