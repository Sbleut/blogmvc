<?php

/**
 *The ErrorController class is responsible for handling errors and exceptions
 */
class ErrorController extends BaseController
{
    /**
     *Shows an error page with the provided exception information
     *@param Exception $exception The exception to be displayed
     *@return void
     */
    public function Show($exception)
    {
        $this->addParam("exception", $exception);
        $this->view("error");
    }
}
