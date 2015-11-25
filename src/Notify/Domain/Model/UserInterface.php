<?php

namespace JLaso\Notify\Domain\Model;

use JLaso\Notify\Domain\Model\Type\Email;
use JLaso\Notify\Domain\Model\Type\Id;
use JLaso\Notify\Domain\Model\Type\PhoneNumber;
use JLaso\Notify\Domain\Model\Type\PreferredNotifyWay;

interface UserInterface
{
    /** @return Id */
    public function getId();
    /** @return PhoneNumber */
    public function getPhoneNumber();
    /** @return Email */
    public function getEmail();
    /** @return PreferredNotifyWay */
    public function getPreferredNotifyWay();
}