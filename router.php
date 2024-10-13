<?php

// $routes = require basePath('routes.php');

// if (array_key_exists($uri, $routes)) {
//     require(basePath($routes[$uri]));
// } else {
//     require basePath($routes['404']);
// }

// class for Router

class Router
{
    protected $routes = [];

    // register method
    public function registerRoute($method, $uri, $controller)
    {
        // update routes [] and added a new value.
        $this->routes[] = ['method' => $method, 'uri' => $uri, 'controller' => $controller];
    }
    /**
     * Add a GET route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }
    /**
     * Add a POST route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }


    /**
     * Add a PUT route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * load error page
     * @param int $httpCode
     * @return void
     */


    public function error($httpCode = 404)
    {
        http_response_code($httpCode);
        loadView(("error/{$httpCode}"));
        exit();
    }
    /**
     
     * route the request
     * 
     * @param string $uri(from super global)
     * @param string $method (from super global)
     * @return void
     */

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            //inspect($this->routes);

            if ($route['uri'] === $uri && $route['method'] === $method) {
                require basePath($route['controller']);
                return;
            }
        }
        $this->error();
    }
}
