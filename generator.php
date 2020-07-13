<?php

if(php_sapi_name() !== "cli") {
    echo 'You need to run this script with a CLI. PHP_SAPI Error.';
    exit;
}

echo "Generated entities.. \n\n";

use App\Config;

include 'vendor/autoload.php';

$classLoader = new \Doctrine\Common\ClassLoader('Entities', __DIR__);
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', __DIR__);
$classLoader->register();

// config
$config = new \Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(__DIR__ . '/App/Entity'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');


$connectionParams = array(
    'driver'   => \App\Config::ORM_DRIVER,
    'host'     => \App\Config::DB_HOST,
    'charset'  => Config::DB_CHARSET,
    'user'     => \App\Config::DB_USER,
    'password' => \App\Config::DB_PASSWORD,
    'dbname'   => \App\Config::DB_NAME,
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);

$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
    $em->getConnection()->getSchemaManager()
);
$driver->setNamespace('App\\Entity\\'); // adds namespaces to the entities
$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
$cmf->setEntityManager($em);
$classes = $driver->getAllClassNames();
$metadata = $cmf->getAllMetadata();
$generator = new Doctrine\ORM\Tools\EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, __DIR__ . '/');

print 'All entities was generated !';
