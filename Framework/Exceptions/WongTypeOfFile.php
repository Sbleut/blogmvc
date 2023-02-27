<?php

class WrongTypeOfFile extends Exception
	{
		public function __construct($message = "The image you tried to upload doesn't fit the wesite criteria. We only accept png or jpeg files")
		{
			parent::__construct($message, "0007");
		}
	}