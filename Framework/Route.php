<?php
class Route
{
	private $path;
	private $controller;
	private $action;
	private $method;
	private $param;
	private $manager;
	private $title;
	private $auth;

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

	public function getPath()
	{
		return $this->path;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getMethod()
	{
		return $this->method;
	}

	public function getParam()
	{
		return $this->param;
	}

	public function getManager()
	{
		return $this->manager;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function run($httpRequest, $config)
	{
		$controller = null;
		if ($this->auth != null) {
			if (!$_SESSION['user']->checkRole($this->auth)) 
			{
				throw new UnauthorizedAccess();
			}
		}

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
	}
}
