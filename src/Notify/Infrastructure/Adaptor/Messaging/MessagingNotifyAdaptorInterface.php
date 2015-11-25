<?php

namespace JLaso\Notify\Infrastructure\Adaptor\Messaging;

use JLaso\Notify\Domain\Model\MessageInterface;
use JLaso\Notify\Domain\Model\UserInterface;

interface MessagingNotifyAdaptorInterface
{
    /**
     * @param UserInterface $user
     * @param MessageInterface $message
     * @return bool
     */
    public function sendNotification(UserInterface $user, MessageInterface $message);
}