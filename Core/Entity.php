<?php

namespace Core;

use App\Config;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Entity {
    
    public static function getEntityManager() {
        
        $dbParams = [
            'driver'   => \App\Config::ORM_DRIVER,
            'host'     => \App\Config::DB_HOST,
            'charset'  => Config::DB_CHARSET,
            'user'     => \App\Config::DB_USER,
            'password' => \App\Config::DB_PASSWORD,
            'dbname'   => \App\Config::DB_NAME,
        ];
    
        $config = Setup::createAnnotationMetadataConfiguration(
            [
                join(DIRECTORY_SEPARATOR, [dirname(__DIR__), "App", "Entity"])
            ],
            true,
            null,
            null,
            false
        );
    
        return EntityManager::create($dbParams, $config);
    }
    
}