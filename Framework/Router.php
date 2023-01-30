<?php
	class Router
	{
		private $listRoute;
		
		public function __construct()
		{
			$stringRoute = file_get_contents('Config/route.json');
			$this->listRoute = json_decode($stringRoute);
		}
		
		public function findRoute($httpRequest, $basepath)
		{
			$url = str_replace($basepath, "", $httpRequest->getUrl());
			$routeFound = array_filter($this->listRoute,function($route) use ($httpRequest, $url){
				return preg_match('#^' . $route->path . '/?$#', $url) && $route->method == $httpRequest->getMethod();
			});
			$numberRoute = count($routeFound);
			if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
			}
			else if($numberRoute == 0)
			{
				throw new NoRouteFoundException($httpRequest);
			}
			else
			{
				return new Route(array_shift($routeFound));	
			}
		}
	}