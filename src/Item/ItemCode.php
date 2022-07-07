<?php

namespace VendingMachine\Item;

class ItemCode implements ItemCodeInterface
{
    protected $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function __toString(): string
    {
        return $this->code;
    }
}