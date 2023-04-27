<?php

/**
 * Class Route represents a route object in the application
 * @package Namespace\To\Class 
 */
class Route
{
	/**
	 * @var string The path of the route
	 */
	private $path;
	/**
	 * @var string The controller class name for the route
	 */
	private $controller;
	/**
	 * @var string The method of the controller to be called
	 */
	private $action;
	/**
	 * @var string The HTTP method used to access the route
	 */
	private $method;
	/**
	 * @var array The parameters needed for the route
	 */
	private $param;
	/**
	 * @var array The manager classes needed for the route
	 */
	private $manager;
	/**
	 * @var string The title of the route
	 */
	private $title;
	/**
	 * @var string|null The role needed to access the route (if any)
	 */
	private $auth;

	/**
	 * Route constructor.
	 * @param $route The route configuration object
	 */
	public function __construct($route)
	{
		$this->path = $route->path;
		$this->controller = $route->controller;
		$this->action = $route->action;
		$this->method = $route->method;
		$this->param = $route->param;
		$this->manager = $route->manager;
		$this->title = $route->title;
		$this->auth = !empty($route->auth) ? $route->auth : null;
	}

	/**
    * Get the path of the route
    * @return string The path of the route
    */
	public function getPath()
	{
		return $this->path;
	}

	/**
    * Get the controller class name for the route
    * @return string The controller class name for the route
    */
	public function getController()
	{
		return $this->controller;
	}

	/**
    * Get the method of the controller to be called
    * @return string The method of the controller to be called
    */
	public function getAction()
	{
		return $this->action;
	}

	/**
    * Get the HTTP method used to access the route
    * @return string The HTTP method used to access the route
    */
	public function getMethod()
	{
		return $this->method;
	}

	/**
    * Get the parameters needed for the route
    * @return array The parameters needed for the route
    */
	public function getParam()
	{
		return $this->param;
	}

	/**
    * Get the manager classes needed for the route
    * @return array The manager classes needed for the route
    */
	public function getManager()
	{
		return $this->manager;
	}

	/**
    * Get the title of the route
    * @return string The title of the route
    */
	public function getTitle()
	{
		return $this->title;
	}

	/**
    * Run the controller action for the route
    * @param HttpRequest $httpRequest The HTTP request object for the route
    * @param Config $config The application configuration object
    * @throws ActionNotFoundException if the action method does not exist in the controller
    * @throws ControllerNotFoundException if the controller class does not exist
    * @throws UnauthorizedAccess if the user does not have the required role to access the route
	*/
	public function run($httpRequest, $config)
	{
		$controller = null;


		$controllerName = $this->controller . "Controller";
		if (class_exists($controllerName)) {

			$controller = new $controllerName($httpRequest, $config);
			if (method_exists($controller, $this->action)) {
				$controller->{$this->action}(...$httpRequest->getParam());
			} else {
				throw new ActionNotFoundException();
			}
		} else {
			throw new ControllerNotFoundException();
		}

		if ($this->auth != null) {
			if (!$_SESSION['user']->checkRole($this->auth)) {
				throw new UnauthorizedAccess();
			}
		}
	}
}
