<?php
class Router {
    protected $routes = [];

    public function get($uri, $callback) {
        $this->routes['GET'][$uri] = $callback;
    }

    public function dispatch($uri) {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($uri, PHP_URL_PATH);

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];
            if (is_callable($callback)) {
                return call_user_func($callback);
            }
            if (is_array($callback)) {
                $controller = new $callback[0];
                $method = $callback[1];
                return call_user_func([$controller, $method]);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
