<?php

class NotAnEmail extends Exception
	{
		public function __construct($message = "Please give an email as a login")
		{
			parent::__construct($message, "0007");
		}
	}