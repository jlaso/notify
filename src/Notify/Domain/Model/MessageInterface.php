<?php

namespace JLaso\Notify\Domain\Model;

interface MessageInterface
{
    /**
     * @return string
     */
    public function getText();

}