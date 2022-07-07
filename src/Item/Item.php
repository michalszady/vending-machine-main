<?php

namespace VendingMachine\Item;

use VendingMachine\Item\ItemCode;

class Item implements ItemInterface
{
    private $price;
    private $count;
    private $code;

    public function __construct($price,$count,$code){
        $this->price = $price;
        $this->count = $count;
        $this->code = $code;
    }

    public function getPrice(): float
    {
        return floatval($this->price);
    }
    public function getCount(): int
    {
        return $this->count;
    }
    public function getCode(): ItemCodeInterface{

        return new ItemCode($this->code);
    }
}