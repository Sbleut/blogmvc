<?php
class User
{
	private $id;
	private $listRole;
	private $mail;
	private $password;
	private $name;
	private $last_name;
	private $pic;
	private $catch_phrase;

	public function __construct()
	{
	}

	public function populate($id, $mail, $password, $name, $lastName, $pic, $catchPhrase)
	{
		$this->id = $id;
		$this->password = $password;
		$this->mail = $mail;
		$this->name = $name;
		$this->last_name = $lastName;
		$this->pic = $pic;
		$this->catch_phrase = $catchPhrase;
	}

	public function checkRole($auth)
        {
            $result = array_filter($this->listRole,function($role) use($auth)
            {
                return $role['name'] == $auth;
            });
            if(count($result) == 1)
            {
                return true;
            }
            return false;
        }


	public function getId()
	{
		return $this->id;
	}

	public function getMail()
	{
		return $this->mail;
	}

	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getLast_name()
	{
		return $this->last_name;
	}

	public function setLast_name($lastName)
	{
		$this->last_name = $lastName;
	}

	public function getPic()
	{
		return $this->pic;
	}

	public function getListRole()
	{
		return $this->listRole;
	}

	public function setListRole($roles)
	{
		$this->listRole = $roles;
	}

	public function getCatch_phrase()
	{
		return $this->catch_phrase;
	}

	public function setCatch_phrase($catchPhrase)
	{
		$this->catch_phrase = $catchPhrase;
	}

	
}
