<?php

namespace Core;

abstract class Controller
{
    protected $route_parameters = [];

    public function __construct($route_parameters) {
        $this->route_parameters = $route_parameters;
    }

    public function __call($name, $args) {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new \Exception("La méthode $method n'existe pas dans le controller " . get_class($this));
        }
    }

    protected function before() {
    }

    protected function after() {
    }

    public function redirectTo($route = '/') {
        header('Location: ' . $route);
    }
}
