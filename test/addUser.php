<?php

include_once __DIR__ . '/../vendor/autoload.php';

use JLaso\Notify\DI\Container;
use JLaso\Notify\Repositories\UserRepository;
use JLaso\Notify\Domain\Model\User;
use JLaso\Notify\Domain\Type\Id;
use JLaso\Notify\Domain\Type\Email;
use JLaso\Notify\Domain\Type\PreferredNotifyWay;
use JLaso\Notify\Domain\Type\PhoneNumber;

if ($argc < 2) {
    die ("You have to invoke this program with phone and email\nphp test/addUser.php phone_number email\n");
}

$phone = $argv[1];
$email = $argv[2];

$container = Container::getInstance();

$user = new User(new Id($phone), new Email($email), new PhoneNumber($phone), PreferredNotifyWay::TELEGRAM());

/** @var UserRepository $userRepository */
$userRepository = $container->get('user-repository');
$userRepository->save($user);

