<?php

namespace JLaso\Notify\Domain\Model;

use JLaso\Notify\Domain\Type\Email;
use JLaso\Notify\Domain\Type\Id;
use JLaso\Notify\Domain\Type\PhoneNumber;
use JLaso\Notify\Domain\Type\PreferredNotifyWay;
use JLaso\Notify\Infrastructure\UserInterface;

class User implements UserInterface
{
    /** @var Id */
    private $id;
    /** @var Email */
    private $email;
    /** @var PhoneNumber */
    private $phoneNumber;
    /** @var PreferredNotifyWay */
    private $preferredNotifyWay;

    /**
     * User constructor.
     * @param Id $id
     * @param Email $email
     * @param PhoneNumber $phoneNumber
     * @param PreferredNotifyWay $preferredNotifyWay
     */
    public function __construct(Id $id, Email $email, PhoneNumber $phoneNumber, PreferredNotifyWay $preferredNotifyWay)
    {
        $this->id = $id;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->preferredNotifyWay = $preferredNotifyWay;
    }

    /**
     * @return Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return PhoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @return PreferredNotifyWay
     */
    public function getPreferredNotifyWay()
    {
        return $this->preferredNotifyWay;
    }

    /**
     * @param Id $id
     */
    public function setId(Id $id)
    {
        $this->id = $id;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email)
    {
        $this->email = $email;
    }

    /**
     * @param PhoneNumber $phoneNumber
     */
    public function setPhoneNumber(PhoneNumber $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @param PreferredNotifyWay $preferredNotifyWay
     */
    public function setPreferredNotifyWay(PreferredNotifyWay $preferredNotifyWay)
    {
        $this->preferredNotifyWay = $preferredNotifyWay;
    }

    /**
     * @param array $array
     * @return User
     */
    public static function createFromArray($array)
    {
        return new User(
            new Id($array['id']),
            new Email($array['email']),
            new PhoneNumber($array['phone_number']),
            new PreferredNotifyWay($array['preferred_notify_way'])
        );
    }
}