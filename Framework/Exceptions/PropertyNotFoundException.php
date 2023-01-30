<?php

class PropertyNotFoundException extends Exception
	{
		public function __construct($message = "No property has been found")
		{
			parent::__construct($message, "0003");
		}
	}