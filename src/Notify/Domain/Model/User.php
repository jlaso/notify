<?php

namespace JLaso\Notify\Domain\Model;

use JLaso\Notify\Infrastructure\UserInterface;

class User implements UserInterface
{
    /** @var  string */
    private $id;
    /** @var  string */
    private $email;
    /** @var  string */
    private $phoneNumber;
    /** @var  string */
    private $preferredNotifyWay;

    /**
     * User constructor.
     * @param string $id
     * @param string $email
     * @param string $phoneNumber
     * @param string $preferredNotifyWay
     */
    public function __construct($id, $email, $phoneNumber, $preferredNotifyWay)
    {
        $this->id = $id;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->preferredNotifyWay = $preferredNotifyWay;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getPreferredNotifyWay()
    {
        return $this->preferredNotifyWay;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param string $preferredNotifyWay
     */
    public function setPreferredNotifyWay($preferredNotifyWay)
    {
        $this->preferredNotifyWay = $preferredNotifyWay;
    }


}