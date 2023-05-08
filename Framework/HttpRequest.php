<?php

/**
 *HttpRequest class is responsible for handling and processing HTTP requests
 *It is used to get information about the request, such as URL and HTTP method,
 *and to bind parameters from the request to the current route. It also runs
 *the current route with the processed request and configuration data.
 */
class HttpRequest
{
	private $url;
	private $method;
	private $param;
	private $route;

	/**
	 * Constructs an instance of the HttpRequest class.
	 * @param string $url (optional) The URL of the request. Defaults to null.
	 * @param string $method (optional) The HTTP method of the request. Defaults to null.
	 */
	public function __construct($url = null, $method = null)
	{
		$this->url = (!empty($url)) ? $url : $_SERVER['REQUEST_URI'];
		$this->method = (!empty($method)) ? $method : $_SERVER['REQUEST_METHOD'];
		$this->param = array();
	}

	/**
	 *Returns the URL of the request.
	 *@return string The URL of the request.
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Returns the HTTP method of the request.
	 * @return string The HTTP method of the request.
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * Returns the parameters of the request.
	 * @return array The parameters of the request.
	 */
	public function getParams()
	{
		return $this->param;
	}

	/**
	 * Sets the current route of the request.
	 * @param Route $route The current route of the request.
	 * @return void
	 */
	public function setRoute($route)
	{
		$this->route = $route;
	}

	/**
	 * Binds the parameters of the request to the current route.
	 * @return void
	 */
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

	/**
	 * Binds the route parameters to the current request.
	 * @param Config $config The configuration object.
	 * @return void
	 */
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

	/**
	 * Returns the current route of the request.
	 * @return Route The current route of the request.
	 */
	public function getRoute()
	{
		return $this->route;
	}

	/**
	 * Returns the parameters of the request
	 * @return array - The parameters of the request
	 */
	public function getParam()
	{
		return $this->param;
	}

	/**
	 * Runs the request by binding the parameters to the route and executing it
	 * @param Config $config - The configuration of the application
	 */
	public function run($config)
	{
		$this->bindParam();
		$this->bindRouteParam($config);
		$this->route->run($this, $config);
	}

	/**
	 * Adds a parameter to the current HTTP request
	 *
	 * @param mixed $value The value of the parameter to be added
	 * @return void
	 */
	public function addParam($value)
	{
		$this->param[] = $value;
	}
}
