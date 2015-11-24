<?php

namespace JLaso\Notify\Infrastructure;

use JLaso\Notify\Domain\Type\Email;
use JLaso\Notify\Domain\Type\Id;
use JLaso\Notify\Domain\Type\PhoneNumber;
use JLaso\Notify\Domain\Type\PreferredNotifyWay;

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