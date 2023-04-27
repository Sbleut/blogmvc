<?php

/**
 * Exception class to handle cases where the picture being uploaded is too big.
 *
 * @package MyApp\Exceptions
 */
class PictureTooBig extends Exception
{
    /**
     * Constructor for the exception.
     *
     * @param string $message The error message to display.
     * @param string $code The error code to assign.
     * @param Exception $previous The previous exception that caused this one, if any.
     */
    public function __construct($message = "The image you tried to upload doesn't fit the website criteria. We only accept files below 0,5 Mo", $code = "0008", $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
