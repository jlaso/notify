<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\DI\Container;

$container = Container::getInstance();

$repositories = [
    'user-repository',
];

foreach ($repositories as $repository) {
    $container->get($repository)->initSchema();
};


