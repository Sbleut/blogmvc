<?php
class User
{
	private $id;
	private $mail;
	private $password;
	private $date;

	public function __construct()
	{
	}

	public function getMail()
	{
		return $this->mail;
	}

	public function getPassword()
	{
		return $this->password;
	}
}
