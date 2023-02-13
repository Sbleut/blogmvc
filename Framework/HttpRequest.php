<?php
class HttpRequest
{
	private $url;
	private $method;
	private $param;
	private $route;

	public function __construct($url = null, $method = null)
	{
		$this->url = (is_null($url)) ? $_SERVER['REQUEST_URI'] : $url;
		$this->method = (is_null($method)) ? $_SERVER['REQUEST_METHOD'] : $method;
		$this->param = array();
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getParams()
	{
		return $this->param;
	}

	public function setRoute($route)
	{
		$this->route = $route;
	}

	public function bindParam()
	{
		switch ($this->method) {
			case "GET":
			case "DELETE":
				foreach ($this->route->getParam() as $param) {
					if (isset($_GET[$param])) {
						$this->param[] = $_GET[$param];
					}
				}
			case "POST":
			case "PUT":
				foreach ($this->route->getParam() as $param) {
					if (isset($_POST[$param])) {
						$this->param[] = $_POST[$param];
					}
				}
		}
	}

	public function getRoute()
	{
		return $this->route;
	}

	public function getParam()
	{
		return $this->param;
	}

	public function run($config)
	{
		$this->bindParam();
		$this->route->run($this, $config);
	}

	public function addParam($value)
	{
		$this->param[] = $value;
	}
}
