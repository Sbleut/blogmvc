<?php

class WrongLoginException extends Exception
	{
		public function __construct($message = "No Account has been found")
		{
			parent::__construct($message, "0006");
		}
	}