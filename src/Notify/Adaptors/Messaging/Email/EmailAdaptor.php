<?php

namespace JLaso\Notify\Adaptors\Messaging\Email;

use JLaso\Notify\Adaptors\Messaging\MessagingNotifyAdaptorInterface;
use JLaso\Notify\Infrastructure\MessageInterface;
use JLaso\Notify\Infrastructure\UserInterface;

class EmailAdaptor implements MessagingNotifyAdaptorInterface
{
    /** @var \Swift_Mailer  */
    protected $mailer;
    protected $from;

    /**
     * EmailAdaptor constructor.
     */
    public function __construct($config)
    {
        $transport = \Swift_SmtpTransport::newInstance($config['host'], $config['port'], $config['encryption'])
            ->setUsername($config['username'])
            ->setPassword($config['password'])
        ;

        $this->from = array($config['username'] => $config['username']);

        $this->mailer = \Swift_Mailer::newInstance($transport);
    }

    /**
     * @param UserInterface $user
     * @param MessageInterface $message
     * @return bool
     */
    public function sendNotification(UserInterface $user, MessageInterface $message)
    {
        $msg = \Swift_Message::newInstance()
            ->setSubject("Message from me")
            ->setFrom($this->from)
            ->setTo(array($user->getEmail()))
            ->setBody($message->getText())
        ;

        $this->mailer->send($msg);
    }

}