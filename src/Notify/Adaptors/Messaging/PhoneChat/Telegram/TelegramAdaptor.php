<?php

namespace JLaso\Notify\Adaptors\Messaging\PhoneChat\Telegram;

use JLaso\Notify\Adaptors\Messaging\MessagingNotifyAdaptorInterface;
use JLaso\Notify\Infrastructure\MessageInterface;
use JLaso\Notify\Infrastructure\UserInterface;
use TelegramCliWrapper\TelegramCliWrapper;

class TelegramAdaptor implements MessagingNotifyAdaptorInterface
{
    /** @var TelegramCliWrapper */
    protected $telegramCli = null;

    /**
     * TelegramAdaptor constructor.
     */
    public function __construct(TelegramCliWrapper $telegramCli)
    {
        $this->telegramCli = $telegramCli;
    }

    /**
     * @param UserInterface $user
     * @param MessageInterface $message
     * @return bool
     */
    public function sendNotification(UserInterface $user, MessageInterface $message)
    {
        $this->telegramCli->msg($user->getPhoneNumber()->getValue(), $message->getText());

        return true;
    }


}