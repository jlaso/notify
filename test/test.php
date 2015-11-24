<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\DI\Container;
use JLaso\Notify\Adaptors\Messaging\PhoneChat\Telegram\TelegramAdaptor;
use JLaso\Notify\Adaptors\Messaging\Email\EmailAdaptor;

if ($argc < 3) {
    die ("You have to invoke this program with phone, email and message\n");
}

$phone = $argv[1];
$email = $argv[2];
$message = $argv[3];

$container = Container::getInstance();

$user = new \JLaso\Notify\Domain\Model\User("1", $email, $phone, "telegram");
$message = new \JLaso\Notify\Domain\Model\Message($message);

/** @var EmailAdaptor $mailer */
$mailer = $container->get('mailer');
$mailer->sendNotification($user, $message);

/** @var TelegramAdaptor $telegram */
$telegram = $container->get('telegram');
$telegram->sendNotification($user, $message);
