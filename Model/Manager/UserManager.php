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

	/**
	 * Set the basic ROLE_USER to a given user.
	 *
	 * @param int $id The ID of the user to set role for.
	 * @return bool True or false depending on the success of the execution in bdd.
	 */
	public function setBasicRole($id)
	{
		$id = (int)$id; // Cast the parameter to an integer
		$req = $this->bdd->prepare("INSERT INTO user_has_role (userid, roleid) VALUES ( ?, 2)");
		return $req->execute(array($id));
	}

	/**
	 * Ad a new role a given user.
	 *
	 * @param int $id The ID of the user to set role for.
	 * @param string $role The string defining the role ('ROLE_ADMIN' = 1, 'ROLE_USER' = 2 or others to come).
	 * @return bool True or false depending on the success of the execution in bdd.
	 */
	public function addNewRole($id, $role_id=2)
	{
		$id = (int)$id; // Cast the parameter to an integer
		$role_id = (int)$role_id;
		$req = $this->bdd->prepare("INSERT INTO user_has_role (userid, roleid) VALUES ( ?, ?)");
		return $req->execute(array($id, $role_id));
	}
}
