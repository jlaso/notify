<?php

namespace JLaso\Notify\Domain\Type;

class PhoneNumber
{
    /** @var string */
    protected $value;

    /**
     * Email constructor.
     * @param string $phoneNumber
     */
    public function __construct($phoneNumber)
    {
        $this->value = trim($phoneNumber);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function equalsTo(PhoneNumber $phoneNumber)
    {
        return $this->value == $phoneNumber->getValue();
    }

}