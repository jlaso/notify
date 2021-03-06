<?php

namespace JLaso\Notify\Domain\Model;

class Message implements MessageInterface
{
    /** @var string */
    protected $text;

    /**
     * Message constructor.
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

}