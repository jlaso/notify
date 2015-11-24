<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\DI\Container;
use JLaso\Notify\Repositories\UserRepository;

$container = Container::getInstance();

/** @var UserRepository $userRepository */
$userRepository = $container->get('user-repository');

$users = $userRepository->findAll();

if (count($users) > 0) {
    foreach ($users as $user) {
        printf(
            "id: %s\nemail: %s\nphone_number: %s\npreferred_notify_way: %s\n\n",
            $user->getId()->getValue(),
            $user->getEmail()->getValue(),
            $user->getPhoneNumber()->getValue(),
            $user->getPreferredNotifyWay()->getValue()
        );
    }
}else{
    echo "There are no users locally\n";
}
