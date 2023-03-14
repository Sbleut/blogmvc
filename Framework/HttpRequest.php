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

	private function bindRouteParam($config)
    {
		$url = str_replace($config->basepath, "", $this->getUrl());
        $routeParam = $this->route->getParam();
        if (preg_match('#^' . $this->route->getPath() . '\/?$#', $url, $listRouteParam) > 0) {
            for ($i = 0; $i <= count($listRouteParam) - 2; $i++) {
                $this->param[$routeParam[$i]] = $listRouteParam[$i + 1];
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
		$this->bindRouteParam($config);
		$this->route->run($this, $config);
	}
	
	public function addParam($value)
	{
		$this->param[] = $value;
	}
}
