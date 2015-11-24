<?php

namespace JLaso\Notify\Domain\Type;


use JLaso\Notify\Domain\Assert\Assert;

class PreferredNotifyWay
{
    const EMAIL = "email";
    const TELEGRAM = "telegram";

    /** @var  string */
    protected $value;

    /**
     * PreferredNotifyWay constructor.
     * @param string $value
     */
    public function __construct($value)
    {
        Assert::assertsIsInArray($value, $this->getOptions());
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param PreferredNotifyWay $preferredNotifyWay
     * @return bool
     */
    public function equalsTo(PreferredNotifyWay $preferredNotifyWay)
    {
        return $this->value == $preferredNotifyWay->getValue();
    }

    /**
     * @return string[]
     */
    public static function getOptions()
    {
        return [
            self::EMAIL,
            self::TELEGRAM,
        ];
    }

    /**
     * @return PreferredNotifyWay
     */
    public static function TELEGRAM()
    {
        return new static(self::TELEGRAM);
    }

    /**
     * @return PreferredNotifyWay
     */
    public static function EMAIL()
    {
        return new static(self::EMAIL);
    }
}