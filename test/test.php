<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\DI\Container;
use JLaso\Notify\Adaptors\Messaging\PhoneChat\Telegram\TelegramAdaptor;
use JLaso\Notify\Adaptors\Messaging\Email\EmailAdaptor;
use JLaso\Notify\Repositories\UserRepository;
use JLaso\Notify\Domain\Model\Message;

if ($argc < 2) {
    die ("You have to invoke this program with phone and message\nphp test/test.php phone_number message\n");
}

$phone = $argv[1];
$message = new Message($argv[2]);

$container = Container::getInstance();

/** @var UserRepository $userRepository */
$userRepository = $container->get('user-repository');
$user = $userRepository->find($phone);

if (!$user) {
    die ("User with phone {$phone} not found");
}

/** @var EmailAdaptor $mailer */
$mailer = $container->get('mailer');
$mailer->sendNotification($user, $message);

/** @var TelegramAdaptor $telegram */
$telegram = $container->get('telegram');
$telegram->sendNotification($user, $message);
