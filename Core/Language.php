<?php

namespace Core;

use App\Config;

class Language {


    public static function get($key, $args = []) {
        $lang = $_COOKIE['language'] ?? Config::DEFAULT_LANGUAGE;

        if(!in_array($lang, Config::LANGUAGES)) {
            $lang = Config::DEFAULT_LANGUAGE;
        }

        $file = "../langs/" . $lang . ".php";
        try {

            $data = include $file;
            $data = $data ?? [];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        if(isset($data[$key])) {
            return sprintf($data[$key], ...$args);
        } else {
            return "Missing argument in $lang file";
        }
    }

}
