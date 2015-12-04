<?php

namespace JLaso\Notify\Domain\Model\Type;

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
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param PhoneNumber $phoneNumber
     * @return bool
     */
    public function equalsTo(PhoneNumber $phoneNumber)
    {
        return $this->value == $phoneNumber->getValue();
    }

}