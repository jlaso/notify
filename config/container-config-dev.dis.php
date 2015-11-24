<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Interop\Container\ContainerInterface;

return [
    // app
    'root_dir' => dirname(__DIR__) . '/src',

    // database
    'database' => array(
        'path' => __DIR__ . '/../db/database.dev.sqlite',
        'driver' => 'pdo_sqlite',
    ),

    // repositories
    'user-repository' => function (ContainerInterface $c) {
        return new \JLaso\Notify\Repositories\UserRepository($c->get('database'));
    },

    // telegram-chat-service
    'telegram-cli-socket' => 'unix:///tmp/tg.sck',
    'telegram-cli' => function (ContainerInterface $c) {
        return new \TelegramCliWrapper\TelegramCliWrapper($c->get('telegram-cli-socket'), true);
    },
    'telegram' => function (ContainerInterface $c) {
        return new \JLaso\Notify\Adaptors\Messaging\PhoneChat\Telegram\TelegramAdaptor($c->get('telegram-cli'));
    },

    // mailer
    'mail_config' => array(
        'host'=> 'smtp.example.com',
        'encryption'=> '',
        'port' => 25,
        'username' => 'username',
        'password' => 'password',
    ),
    'mailer' => function (ContainerInterface $c) {
        return new \JLaso\Notify\Adaptors\Messaging\Email\EmailAdaptor($c->get('mail_config'));
    },

];