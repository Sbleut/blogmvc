<?php

/**
 * A class for managing user data in a database.
 *
 * This class extends the BaseManager class and provides methods for retrieving user data
 * from the connected database. The class assumes that the database has a "user" table with
 * columns "id", "mail", and other user-specific columns.
 */
class userManager extends BaseManager
{
	/**
	 * Creates a new instance of the userManager class.
	 *
	 * @param mixed $datasource A database connection string or object.
	 */
	public function __construct($datasource)
	{
		parent::__construct("user", "User", $datasource);
	}

	/**
	 * Retrieves a user by their email address.
	 *
	 * @param string $mail The email address of the user to retrieve.
	 * @return User|null The User object representing the retrieved user, or null if no user was found.
	 */
	public function getByMail($mail)
	{
		$req = $this->bdd->prepare("SELECT * FROM user WHERE mail=?");
		$req->execute(array($mail));
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
		return $req->fetch();
	}

	/**
	 * Retrieves a user by their ID.
	 *
	 * @param int $id The ID of the user to retrieve.
	 * @return User|null The User object representing the retrieved user, or null if no user was found.
	 */
	public function getById($id)
	{
		$req = $this->bdd->prepare("SELECT * FROM user WHERE id=?");
		$req->execute(array($id));
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "User");
		return $req->fetch();
	}

	/**
	 * Retrieves the roles of a user.
	 *
	 * @param int $id The ID of the user to retrieve roles for.
	 * @return array An array of associative arrays, each representing a role that the user has.
	 */
	public function getRole($id)
	{
		$req = $this->bdd->prepare("SELECT role.* FROM user_has_role
        INNER JOIN role 
        ON role.id = user_has_role.roleid WHERE userid=?");
		$req->execute(array($id));
		$req->setFetchMode(PDO::FETCH_ASSOC);
		return $req->fetchAll();
	}
}
