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
				if (preg_match("#" . $this->route . "#", $this->url, $matches)) {
					for ($i = 1; $i < count($matches) - 1; $i++) {
						$this->param[] = $matches[$i];
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
		$this->route->run($this, $config);
	}

	public function addParam($value)
	{
		$this->param[] = $value;
	}
}
