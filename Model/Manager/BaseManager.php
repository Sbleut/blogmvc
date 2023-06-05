<?php

/**
 * Class BaseManager
 * A base class for database table managers.
 */
class BaseManager
{
	private $table;
	private $object;
	protected $bdd;

	/**
	 * BaseManager constructor.
	 * @param string $table The name of the table to manage.
	 * @param string $object The name of the class to instantiate when fetching rows.
	 * @param string $datasource The name of the datasource for the database.
	 */
	public function __construct($table, $object, $datasource)
	{
		$this->table = $table;
		$this->object = $object;
		$this->bdd = BDD::getInstance($datasource);
	}

	/**
	 * Gets a row from the table by its ID.
	 * @param int $id The ID of the row to fetch.
	 * @return mixed The object representing the fetched row.
	 */
	public function getById($id)
	{
		$req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
		$req->execute(array($id));
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->object);
		return $req->fetch();
	}

	/**
	 * Gets all rows from the table.
	 * @return array An array of objects representing the rows in the table.
	 */
	public function getAll()
	{
		$req = $this->bdd->prepare("SELECT * FROM " . $this->table);
		$req->execute();
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->object);
		return $req->fetchAll();
	}

	/**
	 * Inserts a new row into the table.
	 * @param object $obj The object representing the row to insert.
	 * @param array $param An array of the column names to insert into.
	 * @return bool True if the insert was successful, false otherwise.
	 */
	public function create($obj, $param)
	{
		$paramNumber = count($param);
		$valueArray = array_fill(1, $paramNumber, "?");
		$valueString = implode(", ", $valueArray);
		$sql = "INSERT INTO " . $this->table . "(" . implode(", ", $param) . ") VALUES(" . $valueString . ")";

		$req = $this->bdd->prepare($sql);
		$boundParam = array();

		foreach ($param as $paramName) {
			$boundParam[] = $obj->{'get' . ucfirst($paramName)}();
		}
		return $req->execute($boundParam);
	}

	/**
	 * Updates a row in the table.
	 * @param object $obj The object representing the row to update.
	 * @param array $param An array of the column names to update.
	 * @return bool True if the update was successful, false otherwise.
	 */
	public function update($obj, $param)
	{
		$sql = "UPDATE " . $this->table . " SET ";
		$numParams = count($param);
		$i = 0;
		while ($i < $numParams) {
			$sql = $sql . $param[$i] . " = ?";
			if ($i !== $numParams - 1) {
				$sql = $sql . ", ";
			}
			$i++;
		}

		$sql = $sql . " WHERE id =" . $obj->getId() . ";";
		$req = $this->bdd->prepare($sql);

		$boundParam = array();
		foreach ($param as $paramName) {
			$boundParam[] = $obj->{'get' . ucfirst($paramName)}();
		}

		return $req->execute($boundParam);
	}

	/**
	 * Delete an object from the database.
	 * @param object $obj The object to delete.
	 * @throws PropertyNotFoundException If the object doesn't have a property "id".
	 * @return bool True if the deletion was successful, false otherwise.
	 */
	public function delete($obj)
	{

		if (property_exists($obj, "id")) {
			$req = $this->bdd->prepare("DELETE FROM " . $this->table . " WHERE id=?");
			return $req->execute(array($obj->getId()));
		} else {
			throw new PropertyNotFoundException($this->object, "id");
		}
	}

	/**
	 * Sets object properties based on the data passed as an array.
	 * @param array $data Array containing property names and values to be set.
	 * @return void
	 */
	public function setProperties($data)
	{
		foreach ($data as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
	}

	/**
	 * Returns an associative array containing all the properties of the given object as keys and their corresponding values.
	 *
	 * @param object $object The object whose properties to retrieve.
	 * @return array An associative array containing the object's properties and their values.
	 */
	function getProperties($object)
	{
		$properties = [];
		foreach ($object as $property => $value) {
			$properties[$property] = $value;
		}
		return $properties;
	}
}
