<?php

namespace Core;

abstract class Request
{
    public static function isPost() {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            return true;
        }

        return false;
    }

    public static function isGet() {
        if($_SERVER['REQUEST_METHOD'] == "GET") {
            return true;
        }

        return false;
    }

    public static function getAllParams() {
        if(self::isPost()) {
            return $_POST;
        }

        if(self::isGet()) {
            return $_GET;
        }

        return [];
    }
}
