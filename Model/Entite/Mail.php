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
	private $email_address;

    /**
	 * @var string The message left by the author
	 */
	private $message;

	/**
	 * @var boolean The adminRequest is true is the message is an admin request.
	 */
	private $admin_request;

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
	 * @param bool $adminRequest The 
     */

     public function populate($id, $name, $email_address, $message, $admin_request)
     {
        $this->id=$id;
        $this->name=$name;
        $this->email_address=$email_address;
        $this->message=$message;
		$this->admin_request=$admin_request;
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
		return $this->email_address;
	}

	/**
	 * Sets the email of the user.
	 * @param string $mail The new email of the user.
	 */
	public function setEmail_address($email_address)
	{
		$this->email_address = $email_address;
	}

    /**
	 * @return string Returns the email of the user.
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Sets the message of the user.
	 * @param string $message The message of the user.
	 */
	public function setMessage($message)
	{
		$this->message = $message;
	}

	/**
	 * @return bool Returns true or false.
	 */
	public function getAdmin_request()
	{
		return $this->admin_request;
	}

	/**
	 * Sets the adminRequest to true or false.
	 * @param  bool  $adminRequest is the message an admin request or not.
	 */
	public function setAdmin_request($admin_request)
	{
		$this->admin_request = $admin_request;
	}
}

