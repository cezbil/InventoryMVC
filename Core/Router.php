<?php
namespace Core;

class Router
{

    /**
     * @var array
     */
    protected $routes = [];
    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }


    /**
     * @param $route
     * @param $params
     */
    public function add($route, $params = []){
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);


        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;    }


    /**
     * @param $url
     * @return $this
     */
    public function routeTo($url){
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }


    public function dispatch($url)
    {
        if ($this->routeTo($url)) {
            $controller = $this->params['controller'];
            $controller = $this->ControllerName($controller);
            $controller = $this->getNamespace() . $controller ;

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);
                $action = $this->params['action'];
                $action = $this->actionName($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo 'method $action in $controller not found';
                }
            } else {
                echo "Controller class $controller not found";
            }
        } else {
            echo 'No route matched.';
        }
    }

    protected function ControllerName($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function actionName($string)
    {
        return lcfirst($this->ControllerName($string));
    }

    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }
}