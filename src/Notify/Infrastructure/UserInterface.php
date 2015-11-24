<?php

namespace JLaso\Notify\Infrastructure;

interface UserInterface
{
    public function getId();
    public function getPhoneNumber();
    public function getEmail();
    public function getPreferredNotifyWay();
}