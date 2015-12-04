<?php

namespace JLaso\Notify\Domain\Model\Type;

use JLaso\Assert\Assert;
use JLaso\Assert\AssertException;

class Email
{
    /** @var string */
    protected $value;

    /**
     * Email constructor.
     * @param string $email
     * @throws AssertException
     */
    public function __construct($email)
    {
        $email = trim(strtolower($email));
        Assert::assertsIsAnEmail($email);
        $this->value = $email;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param Email $email
     * @return bool
     */
    public function equalsTo(Email $email)
    {
        return $this->value == $email->getValue();
    }

}