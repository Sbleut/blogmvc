<?php

/**Class Mail represents Mailed send from the application to webmaster. As it's a little blog with few visitors it's assumed it will be manageable in Bdd
 */
class Mail
{
    /**
	 * @var int The id of the mail.
	 */
	private $id;

    /**
	 * @var string Mail author's name
	 */
	private $name;

    /**
	 * @var string Email address of the author.
	 */
	private $mail;

    /**
	 * @var string The message left by the author
	 */
	private $message;

    /**
	 * Mail constructor.
	 */
	public function __construct()
	{
	}

    /** 
     * Populates the mail objet with the given data.
     * @param int $id The id of the mail.
     * @param string $name Mail author's name.
     * @param string $mail Email address of the author.
     * @param string $message The message left by the author.
     */

     public function populate($id, $name, $mail, $message)
     {
        $this->id=$id;
        $this->name=$name;
        $this->mail=$mail;
        $this->message=$message;
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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the email of the user.
	 * @param string $mail The new email of the user.
	 */

	public function setName($name)
	{
		$this->name = $name;
	}

    /**
	 * @return string Returns the email of the user.
	 */
	public function getEmail_address()
	{
		return $this->mail;
	}

	/**
	 * Sets the email of the user.
	 * @param string $mail The new email of the user.
	 */
	public function setEmail_address($mail)
	{
		$this->mail = $mail;
	}

    /**
	 * @return string Returns the email of the user.
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Sets the email of the user.
	 * @param string $mail The new email of the user.
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}
}

