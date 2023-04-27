<?php
/**
 * Router class that is responsible for finding the route based on the HTTP request
 */
class Router
{
    /**
     * List of routes
     * 
     * @var array
     */
    private $listRoute;

    /**
     * Constructs the Router object by loading the routes from the route.json file
     */
    public function __construct()
    {
        $stringRoute = file_get_contents('Config/route.json');
        $this->listRoute = json_decode($stringRoute);
    }

    /**
     * Finds the route that matches the HTTP request
     * 
     * @param HttpRequest $httpRequest The HTTP request object
     * @param string $basepath The basepath of the application
     * 
     * @throws MultipleRouteFoundException If multiple routes are found for the same URL and method
     * @throws NoRouteFoundException If no route is found for the URL and method
     * 
     * @return Route The route object that matches the HTTP request
     */
    public function findRoute($httpRequest, $basepath)
    {
        $url = str_replace($basepath, "", $httpRequest->getUrl());
        $routeFound = array_filter($this->listRoute, function ($route) use ($httpRequest, $url) {
            return preg_match('#^' . $route->path . '/?$#', $url) && $route->method == $httpRequest->getMethod();
        });
        $numberRoute = count($routeFound);
        if ($numberRoute > 1) {
            throw new MultipleRouteFoundException();
        } else if ($numberRoute == 0) {
            throw new NoRouteFoundException($httpRequest);
        } else {
            return new Route(array_shift($routeFound));
        }
	}
}