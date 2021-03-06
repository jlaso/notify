<?php

namespace JLaso\Notify\Domain\Model\Type;

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

    /**
     * @param Id $id
     * @return bool
     */
    public function equalsTo(Id $id)
    {
        return $this->value == $id->getId();
    }

}