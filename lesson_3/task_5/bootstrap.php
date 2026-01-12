<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

require_once __DIR__ . '/vendor/autoload.php';

$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true,
);

$connectionParams = [
    'driver' => 'pdo_mysql',
    'host' => '127.0.0.1',
    'dbname' => 'my_database',
    'user' => 'root',
    'password' => '',
    'charset' => 'utf8mb4',
];

$connection = DriverManager::getConnection($connectionParams);

$entityManager = new EntityManager($connection, $config);