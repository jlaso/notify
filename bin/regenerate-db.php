<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\Domain\Service\DI\Container;
use JLaso\Console as JLasoConsole;

$options = JLasoConsole\ArgumentsHelper::getInstance()
            ->addHelpOption()
            ->addOption("env", JLasoConsole\ConsoleOptionType::OPTIONAL(), "Environment", "dev")->setAlternatives(["dev","prod"])
            ->bind($help = true);

Container::setEnv($options['env']);
$container = Container::getInstance();

$repositories = [
    'user-repository',
];

foreach ($repositories as $repository) {
    $container->get($repository)->initSchema();
};


