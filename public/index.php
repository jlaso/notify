<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Slim\App;
use Slim\Container;
use Slim\Views\TwigExtension;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$container = new Container($configuration);

// Register component on container
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../src/Application/Templating', [
        'cache' => __DIR__ . '/../cache'
    ]);
    $view->addExtension(new TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    return $view;
};

$container['debug'] = true;

// Create app
$app = new App($container);

// Render Twig template in route
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'home/index.html.twig');
})->setName('profile');

// Run app
$app->run();