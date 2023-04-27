<?php

/**

 *Exception class for when no route has been found for a specific HTTP request.
 */
class NoRouteFoundException extends Exception
{
	private $_httpRequest;

	/**
	 * Constructor for the NoRouteFoundException class.
	 * @param HttpRequest $httpRequest The HTTP request for which no route was found.
	 * @param string $message The error message.
	 * @param int $code The error code.
	 * @param Exception|null $previous The previous exception, if any.
	 */
	public function __construct($httpRequest, $message = "No route has been found", $code = 0, Exception $previous = null)
	{
		$this->_httpRequest = $httpRequest;
		parent::__construct($message, $code, $previous);
	}

	/**
	 * Gets a more detailed error message with information about the URL and the HTTP method that failed.
	 * @return string The detailed error message.
	 */
	public function getMoreDetail()
	{
		return "Route '" . $this->_httpRequest->getUrl() . "' has not been found with method '" . $this->_httpRequest->getMethod() . "'";
	}
}
