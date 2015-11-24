<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\DI\Container;
use JLaso\Notify\Adaptors\Messaging\PhoneChat\Telegram\TelegramAdaptor;
use JLaso\Notify\Adaptors\Messaging\Email\EmailAdaptor;
use JLaso\Notify\Repositories\UserRepository;

if ($argc < 3) {
    die ("You have to invoke this program with phone, email and message\n");
}

$phone = $argv[1];
$email = $argv[2];
$message = $argv[3];

$container = Container::getInstance();

$user = new \JLaso\Notify\Domain\Model\User("1", $email, $phone, "telegram");
$message = new \JLaso\Notify\Domain\Model\Message($message);

/** @var UserRepository $userRepository */
$userRepository = $container->get('user-repository');

$userRepository->save($user);

/** @var EmailAdaptor $mailer */
$mailer = $container->get('mailer');
$mailer->sendNotification($user, $message);

/** @var TelegramAdaptor $telegram */
$telegram = $container->get('telegram');
$telegram->sendNotification($user, $message);
