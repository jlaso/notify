<?php

namespace JLaso\Notify\Infrastructure;

interface MessageInterface
{
    /**
     * @return string
     */
    public function getText();

}