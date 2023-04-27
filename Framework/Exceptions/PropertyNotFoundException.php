<?php

/**
 * Exception thrown when a property is not found in an object.
 * @package MyApp\Exceptions
 */
class PropertyNotFoundException extends Exception
{
	/**
    * Creates a new instance of PropertyNotFoundException with the given message.
    * @param string $message The exception message
    */
	public function __construct($message = "No property has been found")
	{
		parent::__construct($message, "0003");
	}
}
