<?php

namespace JLaso\Notify\Domain\Type;

use JLaso\Notify\Domain\Assert\Assert;

class Email
{
    /** @var string */
    protected $value;

    /**
     * Email constructor.
     * @param string $email
     */
    public function __construct($email)
    {
        $email = trim(strtolower($email));
        Assert::assertsIsAnEmail($email);
        $this->value = $email;
    }

    /**
     * @return mixed
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