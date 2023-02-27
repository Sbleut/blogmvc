<?php

class PictureTooBig extends Exception
	{
		public function __construct($message = "The image you tried to upload doesn't fit the wesite criteria. We only accept files below 0,5 Mo")
		{
			parent::__construct($message, "0008");
		}
	}