<?php

namespace JLaso\Notify\Domain\Assert;

class AssertException extends \Exception
{
    public function __construct()
    {
        $args = func_get_args();
        $format = array_shift($args);
        parent::__construct(vsprintf($format, $args));
    }
}