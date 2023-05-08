<?php

/**
 *Class User represents a user of the application.
 */
class User
{
	/**
	 * @var int The id of the user.
	 */
	private $iId;
	/**
	 * @var array The list of roles associated to the user.
	 */
	private $listRole;
	/**
	 * @var string The email of the user.
	 */
	private $mail;
	/**
	 * @var string The hashed password of the user.
	 */
	private $password;
	/**
	 * @var string The last name of the user.
	 */
	private $name;
	/**
	 * @var string The URL of the user's profile picture.
	 */
	private $last_name;
	/**
	 * @var string The catch phrase of the user.
	 */
	private $pic;
	/**
	 * @var string The catch phrase of the user.
	 */
	private $catch_phrase;

	/**
	 * User constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Populates the user object with the given data.
	 * @param int $iId The id of the user.
	 * @param string $mail The email of the user.
	 * @param string $password The hashed password of the user.
	 * @param string $name The name of the user.
	 * @param string $lastName The last name of the user.
	 * @param string $pic The URL of the user's profile picture.
	 * @param string $catchPhrase The catch phrase of the user.
	 */
	public function populate($iId, $mail, $password, $name, $lastName, $pic, $catchPhrase)
	{
		$this->id = $iId;
		$this->password = $password;
		$this->mail = $mail;
		$this->name = $name;
		$this->last_name = $lastName;
		$this->pic = $pic;
		$this->catch_phrase = $catchPhrase;
	}

	/**
	 * Checks if the user has a specific role.
	 * @param string $auth The role to check.
	 * @return bool Returns true if the user has the role, false otherwise.
	 */
	public function checkRole($auth)
	{
		$result = array_filter($this->listRole, function ($role) use ($auth) {
			return $role == $auth;
		});
		if (count($result) == 1) {
			return true;
		}
		return false;
	}


	/**
	 * @return int Returns the id of the user.
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string Returns the email of the user.
	 */
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * Sets the email of the user.
	 * @param string $mail The new email of the user.
	 */
	public function setMail($mail)
	{
		$this->mail = $mail;
	}

	/**
	 * @return string Returns the hashed password of the user.
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Sets the password of the user and hash it.
	 * @param string $password The new password of the user.
	 */
	public function setPassword($password)
	{
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$this->password = $hashedPassword;
	}

	/**
	 * @return string Returns the name of the user.
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the name of the user.
	 * @param string $name The name of the user.
	 * @return void
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Get the last name of the user
	 * @return string The last name of the user
	 */
	public function getLast_name()
	{
		return $this->last_name;
	}

	/**
	 * Sets the last name of the user.
	 * @param string $lastName The last name of the user.
	 * @return void
	 */
	public function setLast_name($lastName)
	{
		$this->last_name = $lastName;
	}

	/**
	 * Get the user's profile picture.
	 * @return string The path or URL to the user's profile picture.
	 */
	public function getPic()
	{
		return $this->pic;
	}

	/**
	 * Get the list of roles of the user
	 * @return array The list of roles of the user
	 */
	public function getListRole()
	{
		return $this->listRole;
	}

	/**
	 * Set the list of roles associated with the user
	 * @param array $roles The list of roles to set
	 * @return void
	 */
	public function setListRole($roles)
	{
		$this->listRole = $roles;
	}

	/**
	 * Get the user's catch phrase
	 * @return string The user's catch phrase
	 */
	public function getCatch_phrase()
	{
		return $this->catch_phrase;
	}

	/**
	 * Set the catch phrase of the user.
	 * @param string $catchPhrase The catch phrase to set for the user.
	 * @return void
	 */
	public function setCatch_phrase($catchPhrase)
	{
		$this->catch_phrase = $catchPhrase;
	}
}
