<?php

namespace Core;

use App\Config;

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
        if(
            (
                isset($_COOKIE['language']) &&
                !in_array($_COOKIE['language'], Config::LANGUAGES)
            ) ||
            !isset($_COOKIE['language'])
        ) {
            setcookie('language', Config::DEFAULT_LANGUAGE, time() + 3600 * 24 * 30); // One month
        }
    }

    protected function getLanguage() {
        return $_COOKIE['language'] ?? Config::DEFAULT_LANGUAGE;
    }

    protected function setLanguage($lang) {
        if(in_array($lang, Config::LANGUAGES)) {
            setcookie('language', $lang, time() + 3600 * 24 * 30); // One month
        }
    }

    protected function after() {
    }

    public function redirectTo($route = '/') {
        header('Location: ' . $route);
    }
}
