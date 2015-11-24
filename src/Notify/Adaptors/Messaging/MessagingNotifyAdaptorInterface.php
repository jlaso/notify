<?php

namespace JLaso\Notify\Adaptors\Messaging;

use JLaso\Notify\Infrastructure\MessageInterface;
use JLaso\Notify\Infrastructure\UserInterface;

interface MessagingNotifyAdaptorInterface
{
    /**
     * @param UserInterface $user
     * @param MessageInterface $message
     * @return bool
     */
    public function sendNotification(UserInterface $user, MessageInterface $message);
}