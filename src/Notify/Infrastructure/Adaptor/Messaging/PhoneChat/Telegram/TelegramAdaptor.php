<?php

namespace JLaso\Notify\Infrastructure\Adaptor\Messaging\PhoneChat\Telegram;

use JLaso\Notify\Infrastructure\Adaptor\Messaging\MessagingNotifyAdaptorInterface;
use JLaso\Notify\Domain\Model\MessageInterface;
use JLaso\Notify\Domain\Model\UserInterface;
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