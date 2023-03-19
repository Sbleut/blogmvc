<?php
class BaseManager
{
	private $table;
	private $object;
	protected $bdd;

	public function __construct($table, $object, $datasource)
	{
		$this->table = $table;
		$this->object = $object;
		$this->bdd = BDD::getInstance($datasource);
	}

	public function getById($id)
	{
		$req = $this->bdd->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
		$req->execute(array($id));
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->object);
		return $req->fetch();
	}

	public function getAll()
	{
		$req = $this->bdd->prepare("SELECT * FROM " . $this->table);
		$req->execute();
		$req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->object);
		return $req->fetchAll();
	}

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
		var_dump($sql);
		$req = $this->bdd->prepare($sql);

		$boundParam = array();
		foreach ($param as $paramName) {
			$boundParam[] = $obj->{'get' . ucfirst($paramName)}();
		}

		return $req->execute($boundParam);
	}

	public function delete($obj)
	{
		if (property_exists($obj, "id")) {
			$req = $this->bdd->prepare("DELETE FROM " . $this->table . " WHERE id=?");
			return $req->execute(array($obj->id));
		} else {
			throw new PropertyNotFoundException($this->object, "id");
		}
	}

	public function setProperties($data)
	{
		foreach ($data as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
	}

	function getProperties($object)
	{
		$properties = [];
		foreach ($object as $property => $value) {
			$properties[$property] = $value;
		}
		return $properties;
	}
}
