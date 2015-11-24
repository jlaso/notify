<?php

namespace JLaso\Notify\Domain\Type;

class Id
{
    protected $value;

    /**
     * Id constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->value = $id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function equalsTo(Id $id)
    {
        return $this->value == $id->getId();
    }

}