<?php

/**
 * Class BDD represents a database connection.
 *
 * This class provides a singleton implementation of a PDO database connection. It allows
 * access to the database instance through the static `getInstance` method, which returns
 * the PDO instance.
 *
 * @package BDD
 */
class BDD
{
	private $bdd;
	private static $instance;

	/**
	 * Singleton method to create and return the BDD instance
	 * @param object $datasource Database configuration object containing dbname, host, user, and password
	 * @return PDO The BDD instance
	 */
	public static function getInstance($datasource)
	{
		if (empty(self::$instance)) {
			self::$instance = new BDD($datasource);
		}
		return self::$instance->bdd;
	}

	/**
	 * Constructs a new BDD instance and initializes the PDO connection to the database.
	 *
	 * @param object $database An object containing the necessary database configuration details.
	 * @return void
	 */
	public function __construct($database)
	{
		$this->bdd = new PDO(
			'mysql:dbname=' . $database->dbname . ';host=' . $database->host,
			$database->user,
			$database->password
		);
	}

	/**
	 * Returns the PDO instance of the database connection.
	 *
	 * @return PDO The PDO instance of the database connection.
	 */
	public function getBdd()
	{
		return $this->bdd;
	}
}
